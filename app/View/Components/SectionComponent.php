<?php

namespace App\View\Components;

use App\Models\Section;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SectionComponent extends Component
{
    /**
     * Create a new component instance.
     */

    public $sections;
    public function __construct()
    {
        $paginate = \DB::table('settings')->select('sections_num')->get();
        $this->sections = Section::whereHas('children')->where('status','active')->orderBy('sort','asc')->paginate($paginate[0]->sections_num);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.section-component');
    }
}
