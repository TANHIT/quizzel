<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video; // Import model Video
use App\Models\User; 
use Illuminate\Database\Eloquent\Collection;
use App\Models\CourseRegistration;
class VideoController extends Controller
{
          

            public function quanlyvideo(){
                $videos = Video::paginate(5);
                return view('videos.quanlyvideo', compact('videos'))->with('i', (request()->input('page', 1) - 1) * 5);
            }
            
     //add dữ liệu
              public function index()
                    {
                        $videos = Video::all(); // Lấy danh sách video từ cơ sở dữ liệu
                        return view('videos/videos', compact('videos'));
                    }
            public function store(Request $request)
                    {
                    // Kiểm tra và xử lý dữ liệu đầu vào từ biểu mẫu
                    $request->validate([
                        'title' => 'required',
                        'youtube_url' => 'required',
                    ]);

                    // Tạo một bản ghi video mới trong cơ sở dữ liệu
                    $video = new Video();
                    $video->title = $request->input('title');
                    $video->youtube_url = $request->input('youtube_url');
                    $video->description = $request->input('description');
                    $video->content = $request->input('content');
                    $video->save();

                    // Chuyển hướng về trang quản lý video sau khi lưu thành công
                    return redirect()->route('videos.quanlyvideo');
                    }


        //danh sach video
        public function listvideo(){
            $videos = Video::paginate(8); 
            return view('videos.listvideo', compact('videos'));
        }
      
        
        

        // chi tiết video
        public function show($video_id)
        {
            $video = Video::find($video_id); // Lấy thông tin video từ cơ sở dữ liệu
            $listVideos = Video::take(4)->get(); // Lấy danh sách 4 video từ cơ sở dữ liệu
        
            if (auth()->check()) {
                foreach ($listVideos as $listVideo) {
                    $listVideo->is_pending = false;
                    if ($listVideo->isPendingForUser(auth()->user())) {
                        $listVideo->is_pending = true;
                    }
                }
            }
        
            return view('videos.show', compact('video', 'listVideos'));
        }
        
        


            public function destroy(Video $video)
        {
            $video->delete(); // Xóa video
            return redirect()->route('videos.quanlyvideo'); // Chuyển hướng về trang danh sách video
        }
//edit
        public function edit(Video $video)
        {
            return view('videos.edit', compact('video'));
        }
        public function update(Request $request, Video $video)
        {
            $request->validate([
                'title' => 'required',
                'youtube_url' => 'required',
            ]);

            $video->update([
                'title' => $request->input('title'),
                'youtube_url' => $request->input('youtube_url'),
                'description' => $request->input('description'),
                'content' => $request->input('content'),
            ]);

            return redirect()->route('videos.quanlyvideo');
        }   
//search
  public function search(Request $request)
            {
                $search = $request->input('search'); // Lấy từ khóa tìm kiếm từ biểu mẫu
                $videos = Video::where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->paginate(5);

                return view('videos.quanlyvideo', compact('videos', 'search'))->with('i', ($videos->currentPage() - 1) * $videos->perPage());
            }


           
       
            

            //
            public function quanlynguoixem()
            {
                $registeredUsers = CourseRegistration::with('user', 'video')
                    ->where('status', 'pending')
                    ->paginate(5);

                return view('videos.quanlynguoixem', compact('registeredUsers'))->with('i', ($registeredUsers->currentPage() - 1) * $registeredUsers->perPage());
            }

 // đăng ký xem video 

                public function register(Request $request, $video_id)
                {
                    if (auth()->check()) {
                        $video = Video::find($video_id);
                        if ($video) {
                            $user = auth()->user();
                            $registration = CourseRegistration::where('user_id', $user->id)
                                ->where('video_id', $video_id)
                                ->first();
                
                            if (!$registration) {
                                $user->registeredCourses()->attach($video_id, ['status' => 'pending']);
                                return redirect()->back()   ->with('success', 'Đăng ký xem video thành công. Chờ phê duyệt từ admin.');
                            } else {
                                return redirect()->route('videos.listvideo')->with('error', 'Bạn đã đăng ký xem video này.');
                            }
                        } else {
                            return redirect()->route('videos.listvideo')->with('error', 'Video không tồn tại.');
                        }
                    } else {
                        return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để đăng ký xem video.');
                    }
                }
 
 



                public function approve($id)
                {
                    $registration = CourseRegistration::findOrFail($id);
                    $registration->update(['status' => 'approved']);
                    return redirect()->route('videos.quanlynguoixem')->with('success', 'Phê duyệt thành công.');
                }
                
                public function reject($id)
                {
                    $registration = CourseRegistration::findOrFail($id);
                    $registration->update(['status' => 'rejected']);
                    return redirect()->route('videos.quanlynguoixem')->with('error', 'Từ chối thành công.');
                }
                
                public function searchuser(Request $request)
                {
                    $search = $request->input('search');
                    $registeredUsers = CourseRegistration::with('user', 'video')
                        ->whereHas('user', function ($query) use ($search) {
                            $query->where('name', 'like', "%$search%");
                        })
                        ->paginate(5);

                    return view('videos.quanlynguoixem', compact('registeredUsers'));
                }


                public function delete($id)
                {
                    $registration = CourseRegistration::findOrFail($id);
                    $registration->delete();

                    return redirect()->route('videos.quanlynguoixem')->with('success', 'Xóa yêu cầu thành công.');
                }

            


       
}
