@if (!empty($about_list))
<section id="about" class="about">
  <div class="container" data-aos="fade-up">
    <div class="row">
    @foreach ($about_list as $key => $item)
      <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
        <div class="about-img">
          <img src="{{$item->image}}" alt="">
        </div>
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
        <h3>{{$item->title}}</h3>
        <p class="fst-italic">{{$item->sub_title}}</p>
        {!!$item->description!!}
      </div>
    @endforeach
    </div>
  </div>
</section>
@endif

