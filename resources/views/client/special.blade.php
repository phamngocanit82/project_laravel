@if (!empty($special_list))
<section id="specials" class="specials">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Specials</h2>
      <p>Check Our Specials</p>
    </div>
    <div class="row" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-3">
        <ul class="nav nav-tabs flex-column">
        @php
          $active_show = 'active show';
        @endphp
        @foreach ($special_list as $key => $item)
          <li class="nav-item">
            <a class="nav-link {{$active_show}}" data-bs-toggle="tab" href="#tab-{{$key+1}}">{{$item->item}}</a>
          </li>
          @php
            $active_show = '';
          @endphp
        @endforeach
        </ul>
      </div>
      <div class="col-lg-9 mt-4 mt-lg-0">
        <div class="tab-content">
        @php
          $active_show = 'active show';
        @endphp
        @foreach ($special_list as $key => $item)
          <div class="tab-pane {{$active_show}}" id="tab-{{$key+1}}">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                <h3>{{$item->title}}</h3>
                <p class="fst-italic">{{$item->sub_title}}</p>
                <p>{{$item->description}}</p>
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="{{$item->thumb}}" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          @php
            $active_show = '';
          @endphp
        @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
@endif