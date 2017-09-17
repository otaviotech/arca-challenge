@extends('template.main-layout')

@section('title', isset($query) ? "Results for: $query " : "Search")

@section('content')
  @if ($isSearching && !$noResult)

    <div class="row">
      <h1 class="app-header-2 text-center">Results for "{{ $query }}"</h1>
    </div>

    @include('business.listing')



    <div class="row">
      <div class="col-md-12 text-center">
        {{ $businesses->appends(['q' => $query])->links() }}
      </div>
    </div>
  @endif

  @if (isset($isSearching) && !$isSearching)

    <div class="row">
      <div class="col-md-6 col-md-offset-3" style="margin-top: 50px;">
        <form action="/" method="get" id="searchBusinessForm">
          <div class="form-group" id="businessQueryGroup">
            <input  type="text" id="businessQuery" class="form-control"
                    placeholder="What are you looking for?"
                    name="q"
                    />
            <span class="help-block hidden"  id="emptyQuerySpan">This fild is obrigatory</span>
          </div>
        </form>
      </div>
    </div>

    <div class="row" style="margin-top: 20px;">
      <div class="col-md-12 text-center">
        <button class="btn btn-primary center-block"
                style=" border-radius: 1px;"
                id="submitSearchButton" disabled>Search</button>
      </div>
    </div>
  @endif

  @if ( $noResult && isset($query))
    @if ($businesses->lastPage() <= $businesses->currentPage() )
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center" style="font-weight: 200; font-family: Raleway;">Sorry, no more results for "{{$query}}."</h1>
        </div>
      </div>
    @else
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center" style="font-weight: 200; font-family: Raleway;">No results found for "{{$query}}":</h1>
        </div>
      </div>
    @endif
  @endif


@endsection
