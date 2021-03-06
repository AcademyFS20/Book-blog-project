<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use App\Book;
use App\User;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $book=Book::all();
        // $reviews=Review::all();
        return view('user.review.index', compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->all();
        $request->validate([
            'review'=>'required',
        ]);
        $input['user_id'] = auth()->user()->id;
        Review::create($input);
        return back();
        {
            
            // $review = new Review();
    
            // $review->review = $request->review;
    
            // $review->users()->associate($request->user());
    
            // $book = Book::find($request->book_id);
    
            // $book->reviews()->save($review);
            // return back();
            // Review::create([
            //     'review'=>$request->review,
            //     'book_id'=>$request->book_id,
            //     'user_id'=>$request->user_id,
            // ]);

            // $request->validate([
            //     'review'=>'required',
            // ]);
       
            // $input = $request->all();
            // $input['user_id'] = auth()->user()->id;
        
            // Review::create($input);
       
            // return back();
    
            
        }
    
        
    }
    // public function replyStore(Request $request)
    //     {
    //         $reply = new Review();
    
    //         $reply->review = $request->get('review');
    
    //         $reply->users()->associate($request->user());
    
    //         $reply->parent_id = $request->get('review_id');
    
    //         $book = Book::find($request->get('book_id'));
    //         // $reply = Review::join('users','reviews.user_id','=','users.id');
    
    //         $book->reviews()->save($reply);

            // Review::create([
            //     'review'=>$request->review,
            //     'book_id'=>$request->book_id,
            //     'user_id'=>$request->user_id,
            // ]);
    
            // $request->validate([
            //     'review'=>'required',
            // ]);
       
            // $input = $request->all();
            // $input['user_id'] = auth()->user()->id;
            
            // Review::create($input);
       
        //     return back();
            
    
        // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        
        // $revi=Review::join('users','reviews.user_id','=','users.id')
        // ->select('reviews.id','users.name','users.user_image','reviews.review')->get();
        // dd($revi);
        // $reviewss = Review::with('users.reviews')->get();
        // $reviewss=Book::with('reviews.users')->get();
       
        
        //  dd($reviewss);
        // $user=User::whereHas('reviews',function($query) use ($id) { $query->where('id',$id);})->get();
        
        // return view('user.review.show', compact('book','reviewss'));
        return view('user.review.show', compact('book'));
    }

    // public function show2($id)
    // {
    //     $book = Book::find($id);
    //     $reviews=Review::all();

        // return view('user.review.reply', compact('book', 'reviews'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment=Review::find($id);
        $comment->delete();
        return back()->with('destroy', 'Your comment is deleted');
        
    }
}
