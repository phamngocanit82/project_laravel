@if (!empty($why_us_list))
<section id="why-us" class="why-us">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Why Us</h2>
      <p>Lorem ipsum dolor sit amet</p>
    </div>
    <div class="row">
    @foreach ($why_us_list as $key => $item)
      <div class="col-lg-4 mt-4 mt-4-lg-0">
        <div class="box" data-aos="zoom-in" data-aos-delay="{{$key+1}}00">
          <span>{{$item->title}}</span>
          <h4>{{$item->sub_title}}</h4>
          <p>{{$item->description}}</p>
        </div>
      </div>
    @endforeach
    </div>
  </div>
</section>
@endif