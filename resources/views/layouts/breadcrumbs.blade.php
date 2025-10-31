
@if (count($breadcrumbs))
<div class="panel-content">
    <ol class="breadcrumb breadcrumb-seperator-3 mb-0">
        @foreach ($breadcrumbs as $breadcrumb)
    
            @if ($breadcrumb->url && !$loop->last)
                <li class="breadcrumb-item">
                    <a href="{{ $breadcrumb->url }}">
                        <i class="fal fa-angle-right"></i>
                        <span class="hidden-lg-down">{{ $breadcrumb->title }}</span>                   
                        
                    </a>
                </li>
            @else
                <li class="breadcrumb-item active">
                    <i class="fal fa-arrow-down"></i>
                    <span class="hidden-lg-down">{{ $breadcrumb->title }}</span>       
                    
                </li>
            @endif
    
        @endforeach
    </ol>
    
    
</div>

@endif
