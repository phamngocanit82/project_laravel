@if (!empty($event_list))
<section id="events" class="events">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Events</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
    </div>
    <div class="events-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper-wrapper">
      @foreach ($event_list as $key => $item)
        <div class="swiper-slide">
          <div class="row event-item">
            <div class="col-lg-6">
              <img src="{{$item->image}}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content">
              <h3>{{$item->title}}</h3>
              <div class="price">
                <p><span>${{$item->price}}</span></p>
              </div>
              <p class="fst-italic">{{$item->sub_title}}</p>
              <ul>
                <li><i class="bi bi-check-circled"></i>{{$item->description}}</li>
                <li><i class="bi bi-check-circled"></i>{{$item->description}}</li>
              </ul>
              <p>{{$item->description}}</p>
            </div>
          </div>
        </div>
      @endforeach
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>
@endif