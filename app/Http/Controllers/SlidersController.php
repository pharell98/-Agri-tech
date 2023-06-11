<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Slider;
use App\Http\Requests\SliderRequest;
use Illuminate\Support\Facades\Storage;

class SlidersController extends Controller
{
    private function image($image)
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Contracts\View\View
         */

        if ($image->hasFile('image')) {
            $fileNamaExt = $image->file('image')->getClientOriginalName();
            $fileNAme = pathinfo($fileNamaExt, PATHINFO_FILENAME);
            $extension = $image->file('image')->getClientOriginalExtension();
            $fileNameStore = $fileNAme . '_' . time() . '.' . $extension;
            $path = $image->file('image')->storeAs('public/sliders_image', $fileNameStore);
        } else {
            $fileNameStore = 'NoImage.jpg';
        }
        return $fileNameStore;
    }

    public function index()
    {
        $sliders= Slider::all();
        return view('admin.pages.listeSlider', ['sliders'=>$sliders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.formulaires.ajoutSlider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SliderRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SliderRequest $request)
    {
        $slider = new Slider;
		$slider->description_2 = $request->input('description_2');
		$slider->description_1 = $request->input('description_1');
		$slider->image = $this->image($request) ;
        $slider->status = 0;
        $slider->save();
        $sliders = Slider::all();
        return redirect('sliders')->with('success','Slider ajouter avec success', ['sliders' => $sliders]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function show($id)
    {
        $slider = Slider::findOrFail($id);
        if ($slider->image != 'NoImage.jpg') {
            Storage::delete('public/sliders_image/' . $slider->image);
        }
        $slider->delete();
        $sliders = Slider::all();
        return redirect('sliders')->with(['success', ' Produit suprimer avec success', 'sliders' => $sliders]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.formulaires.editSlider', ['slider' => $slider]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SliderRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SliderRequest $request, $id)
    {
        $slider = Slider::findOrFail($id);
		$slider->description_2 = $request->input('description_2');
		$slider->description_1 = $request->input('description_1');
        if ($slider->image != 'NoImage.jpg' && $request->image != '') {
            Storage::delete('public/sliders_image/' .$slider->image);
        }
        if ($request->image) {$slider->image = $this->image($request);
        }
        $slider->save();
        $sliders = Slider::all();
        return redirect('sliders')->with('success',' Slider modifier avec success', ['sliders' => $sliders]);
    }



    public function activer($id){
        $slider = Slider::findOrFail($id);
        $slider->status = 1;
        $slider->update();
        $sliders = Slider::all();
        return redirect('sliders')->with('success', $slider->libelle_produit . ' activer avec success', ['sliders' => $sliders]);
    }

    public function desactiver($id){
        $slider = Slider::findOrFail($id);
        $slider->status = 0;
        $slider->update();
        $sliders =Slider::all();
        return redirect('sliders')->with('success',$slider->libelle_produit . ' desactiver avec success', ['sliders' => $sliders]);
    }
}
