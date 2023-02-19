@if (!empty($gallery_list))
<section id="gallery" class="gallery">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Gallery</h2>
      <p>Quis quorum aliqua sint quem legam</p>
    </div>
  </div>
  <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
    <div class="row g-0">
    @foreach ($gallery_list as $key => $item)
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="{{$item->image}}" class="gallery-lightbox" data-gall="gallery-item">
            <img src="{{$item->image}}" alt="" class="img-fluid">
          </a>
        </div>
      </div>
    @endforeach
    </div>
  </div>
</section>
@endif