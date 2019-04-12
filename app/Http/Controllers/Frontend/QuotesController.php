<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quote;
use App\Models\Category;
class QuotesController extends Controller
{
    public function index(){
        
        $quotes = Quote::where('deleted', 0)->get();
        
        return view('frontend.quotes.index', compact('quotes', 'categories'));
    
    }
    
    public function create()
    {

        return view('frontend.quotes.create', compact('categories'));
    }
    
    public function store()
    {
        $data = request()->validate([
           
            'text' => 'required|string|max:191',
            'author' => 'required|string|max:120',
            'category_id' => 'required',
        ]);
        
         Quote::create($data);
         
    return redirect()->route('quotes.index');;
    
    }
     public function selectedCategory(Category $category)
    {
       
               
    }
    public function category(Category $category)
    {

        
         $quotes = $category->quotes;
        
         
           return view('frontend.categories.show', compact('category', 'quotes'));
    }
    
     public function edit(Quote $quote)
    {
        
        // dd($quotes);
        return view('frontend.quotes.edit', compact('quote', 'categories'));
    }
    
    public function update(Quote $quote)
    {
        request()->validate([
           
            'text' => 'required|string|max:191',
            'author' => 'required|string|max:120',
            'category_id' => 'required|boolean',
        ]);
        

        $quote->text = request()->text;
        $quote->author = request()->author;
        $quote->category_id = request()->category_id;
       
        
        $quote->save();
        
        return redirect()->route('quotes.index');
    }
    public function delete(Quote $quote){
        
        // hard delete
        //$user->delete();
        
        // soft delete
        $quote->deleted = 1;
        //$quote->deleted_by = auth()->user()->id;
        $quote->save();
        
        return redirect()->route('quotes.index');
    }
    
}
