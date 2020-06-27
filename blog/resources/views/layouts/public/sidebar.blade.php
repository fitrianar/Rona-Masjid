<div class="col-lg-4 col-md-6 col-12 widget-area">
							<!-- Widget : Latest Post -->
							<aside class="widget widget_latestposts">
								<h3 class="widget-title">Artikel Terbaru</h3>
								@foreach(\App\Artikel::artikelTerbaru() as $artikel)
								<div class="latest-content">
									<a href="#" title="Recent Posts"><i><img src="{{ asset($artikel->gambar) }}" width="100" height="80" class="wp-psost-image" height="100px" weight="100px" alt="blog-1" /></i></a>
									<h5><a title="Beautiful Landscape View of Rio de Janeiro" href="{{ route('public-detail-artikel-slug', $artikel->slug) }}">{{ $artikel->judul}}</a></h5>
									<span><a href="{{ route('public-detail-artikel-slug', $artikel->slug) }}">{{ $artikel->created_at }}</a></span>
								</div>
								@endforeach
								
							</aside><!-- Widget : Latest Post /- -->
							<!-- Widget : Aboutme -->
							<!-- <aside class="widget widget_aboutme">
								<h3 class="widget-title">About Me</h3>
								<div class="about-info">
									<img src="http://via.placeholder.com/345x230" alt="widget"/>
									<p>On the other hand, we denounce with righteous indignation 
									and dislike men who are  beguiledand demoralized charms.</p>
									<a href="#" title="READ MORE">READ MORE</a>
								</div>
							</aside> -->
							<!-- Widget : Aboutme /- -->
							<!-- Widget : Categories -->
							<aside class="widget widget_categories text-center">
								<h3 class="widget-title">Categories</h3>
								<ul>
									@foreach(\App\Kategori::kategoriSidebar() as $kategori)
										<li><a href="{{ route('public-artikel-index'). '?kategori='.$kategori->nama }}" title="Nature">{{$kategori->nama}}</a></li>
									@endforeach
								</ul>
							</aside><!-- Widget : Categories /- -->
							
							<!-- Widget : Newsletter -->
							<aside class="widget widget_newsletter">
								<h3 class="widget-title">Berlangganan</h3>
								<div class="newsletter-box">
									<i class="ion-ios-email-outline"></i>
									<h4>Masukan Email Anda untuk Berlangganan Gratis</h4>
									<p>dapatkan informasi terbaru tentang masjid di platform kami</p>
									<form class="form-submit" action="{{ route('berlangganan-store') }}" method="POST">
										@csrf
										<input type="text" class="form-control" name="email" required placeholder="Alamat Email Anda" />
										<input type="submit" value="Berlangganan Sekarang" />
									</form>
								</div>
							</aside><!-- Widget : Newsletter /- -->
							<!-- Widget : Tags -->
							<!-- <aside class="widget widget_tags_cloud">
								<h3 class="widget-title">Tags</h3>
								<div class="tagcloud">
									<a href="#" title="Fashion">Fashion</a>
									<a href="#" title="Travel">Travel</a>
									<a href="#" title="Nature">Nature</a>
									<a href="#" title="Technology">Technology</a>
									<a href="#" title="Sport">Sport</a>
									<a href="#" title="Weather">Weather</a>
									<a href="#" title="Trends">Trends</a>
									<a href="#" title="Lifestyle">Lifestyle</a>
									<a href="#" title="Gear">Gear</a>
								</div>
							</aside> -->
							<!-- Widget : Tags /- -->
							<!-- Widget : Categories -->
							<!-- <aside class="widget widget_categories2">
								<h3 class="widget-title">Categories</h3>
								<div class="categories-box">
									<ul>
										<li>
											<a href="#" title="Nature">
												<img src="http://via.placeholder.com/350x81" alt="categories-img"/>
												<span>Nature</span>
											</a>
										</li>
										<li>
											<a href="#" title="Nature">
												<img src="http://via.placeholder.com/350x81" alt="categories-img"/>
												<span>SPORT</span>
											</a>
										</li>
										<li>
											<a href="#" title="Nature">
												<img src="http://via.placeholder.com/350x81" alt="categories-img"/>
												<span>TRAVEL</span>
											</a>
										</li>
										<li>
											<a href="#" title="Nature">
												<img src="http://via.placeholder.com/350x81" alt="categories-img"/>
												<span>TECHNOLOGY</span>
											</a>
										</li>
									</ul>
								</div>
							</aside> -->
							<!-- Widget : Categories /- -->
							<!-- Widget : Tranding Post -->
							<!-- <aside class="widget widget_tranding_post">
								<h3 class="widget-title">TRENDING Posts</h3>
								<div id="trending-widget" class="carousel slide" data-ride="carousel">
									<div class="carousel-inner">
										<div class="carousel-item active">
											<div class="trnd-post-box">
												<div class="post-cover"><a href="#"><img src="http://via.placeholder.com/345x230" alt="Tranding Post" /></a></div>
												<span class="post-category"><a href="#" title="Lifestyle">Lifestyle</a></span>
												<h3 class="post-title"><a href="#">New Fashion Collection Show This Weekend in Boston </a></h3>
											</div>
										</div>
										<div class="carousel-item">
											<div class="trnd-post-box">
												<div class="post-cover"><a href="#"><img src="http://via.placeholder.com/345x230" alt="Tranding Post" /></a></div>
												<span class="post-category"><a href="#" title="Lifestyle">Lifestyle</a></span>
												<h3 class="post-title"><a href="#">New Fashion Collection Show This Weekend in Boston </a></h3>
											</div>
										</div>
										<div class="carousel-item">
											<div class="trnd-post-box">
												<div class="post-cover"><a href="#"><img src="http://via.placeholder.com/345x230" alt="Tranding Post" /></a></div>
												<span class="post-category"><a href="#" title="Lifestyle">Lifestyle</a></span>
												<h3 class="post-title"><a href="#">New Fashion Collection Show This Weekend in Boston </a></h3>
											</div>
										</div>
									</div>
									<ol class="carousel-indicators">
										<li data-target="#trending-widget" data-slide-to="0" class="active"></li>
										<li data-target="#trending-widget" data-slide-to="1"></li>
										<li data-target="#trending-widget" data-slide-to="2"></li>
									</ol>
								</div>
							</aside> -->
							<!-- Widget : Tranding Post /- -->
							<!-- Widget : Advertise -->
							<!-- <aside class="widget widget_advertise">
								<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
									<ol class="carousel-indicators">
										<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
										<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
										<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
										<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
									</ol>
									<div class="carousel-inner" role="listbox">
										<div class="carousel-item active">
											<img class="d-block img-fluid" src="http://via.placeholder.com/345x308" alt="slide">
											<div class="carousel-caption">
												<h3>Advertiser</h3>
												<p>New Furniture</p>
											</div>
										</div>
										<div class="carousel-item">
											<img class="d-block img-fluid" src="http://via.placeholder.com/345x308" alt="slide">
											<div class="carousel-caption">
												<h3>Advertiser</h3>
												<p>New Furniture</p>
											</div>
										</div>
										<div class="carousel-item">
											<img class="d-block img-fluid" src="http://via.placeholder.com/345x308" alt="slide">
											<div class="carousel-caption">
												<h3>Advertiser</h3>
												<p>New Furniture</p>
											</div>
										</div>
										<div class="carousel-item">
											<img class="d-block img-fluid" src="http://via.placeholder.com/345x308" alt="slide">
											<div class="carousel-caption">
												<h3>Advertiser</h3>
												<p>New Furniture</p>
											</div>
										</div>
									</div>
								</div>	
							</aside> -->
							<!-- Widget : Advertise /- -->
                        </div>

@push('script')
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<script>
 $(".form-submit").submit(function(e) {

e.preventDefault(); // avoid to execute the actual submit of the form.

var form = $(this);
var url = form.attr('action');
var method = form.attr('method') != "POST" ? "POST" : form.attr('method');

$.ajax({
	type: method,
	url: url,
	data: form.serialize(),
	success: function(data) 
	{
		swal(
		    "Sukses Subscribe", "anda akan mendapatkan informasi terbaru lainnya", "success"
		).then(function() {
			location.reload();
		});
	},
	error: function(xhr) {
		var res = xhr.responseJSON;
		if ($.isEmptyObject(res) == false) {
			$.each(res.errors, function(key, value) {

					jQuery("[name=" + key + "]").addClass(' is-invalid').after('<div class="text-danger"><strong>' + value + '</strong></div>');
					jQuery("[name=" + key + "]").parent().parent().addClass('has-error');
		
			});
		}
	}
});
});
</script>
@endpush