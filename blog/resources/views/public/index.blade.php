@extends('layouts.public.app')
@section('title',  $appName)

@section('content')
<div class="col-xl-8 col-lg-8 col-md-6 col-12 content-area">
							<article class="type-post">
								<div class="entry-cover">
									<center><img src="{{ asset($artikelUtama->gambar) }}" alt="Post" /></center>
								</div>
								<div class="entry-content">
									<div class="entry-header">	
									<span class="post-category">
										@forelse($kategori as $ktgr)
											<a href="#" title="{{ $ktgr->nama }}">{{ $ktgr->nama }}, </a>
										@empty
										@endforelse
									</span>
										<h3 class="entry-title">{{ $artikelUtama->judul }}</h3>
										<div class="post-meta">
										<span class="byline">Oleh {{ $artikelUtama->nama }} </span>
										<span class="post-date">{{ $artikelUtama->created_at}}</span>
										</div>
									</div>		

									{!! $artikelUtama->isi  !!}						
									
									<div class="entry-footer">
										<div class="tags">
										@forelse($kategori as $item)
											<a href="#" title="{{ $item->nama }}"># {{ $item->nama }}</a>
										@empty
										<a href="#">tidak ada kategori</a>
										@endforelse
										</div>
										<!-- <ul class="social">
											<li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#" title="Pinterest"><i class="fa fa-pinterest-p"></i></a></li>
										</ul> -->
									</div>
								</div>
							</article>
							<!-- About Author -->
							<div class="about-author-box">
								<div class="author" style="margin-top:-50px; margin-bottom:-90px;">
									<i><img src="{{ asset($artikelUtama->user_gambar) }}" height="100px" width="100px"  alt="Author" /></i>
									<h4>{{$artikelUtama->nama}}</h4>
									<h5>{{ $artikelUtama->nama_masjid }}</h5>
									<!-- <p>To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences.</p>
									<ul>
										<li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#" title="Pinterest"><i class="fa fa-pinterest-p"></i></a></li>
									</ul> -->
								</div>
							</div><!-- About Author /- -->
							<!-- Related Post -->
	<div class="related-post">
		<h3>Daftar Masjid </h3>
		<div class="related-post-block">
		@foreach(\App\Masjid::fetchMasjid() as $masjid)
			<div class="related-post-box">
				<a href="#"><img src="{{$masjid->gambar}}" alt="Post" /></a>
				<span><a href="#" title="Travel">{{ $masjid->alamat_masjid }}</a></span>
				<h3><a href="#" title="Traffic Jams Solved">{{ $masjid->nama_masjid }}</a></h3>
			</div>
		@endforeach
		</div>
	</div>
	<!-- Related Post /- -->
							<!-- Comment Area -->
							<!-- <div class="comments-area">
								<h2 class="comments-title">3 Comments</h2>
								<ol class="comment-list">
									<li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1 parent">
										<div class="comment-body">
											<footer class="comment-meta">
												<div class="comment-author vcard">
													<img alt="img" src="http://via.placeholder.com/70x70" class="avatar avatar-72 photo"/>
													<b class="fn">Alice Chaptman</b>
												</div>
												<div class="comment-metadata">
													<a href="#">10 hours ago</a>											
												</div>
											</footer>
											<div class="comment-content">
												<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure.</p>
											</div>
											<div class="reply">
												<a rel="nofollow" class="comment-reply-link" href="#" title="Reply">Reply</a>
											</div>
										</div>
										<ol class="children">
											<li class="comment byuser comment-author-admin bypostauthor odd alt depth-2 parent">
												<div class="comment-body">
													<footer class="comment-meta">
														<div class="comment-author vcard">
															<img alt="img" src="http://via.placeholder.com/70x70" class="avatar avatar-72 photo"/>
															<b class="fn">Droid Vader</b>
														</div>
														<div class="comment-metadata">
															<a href="#">8 hours ago</a>											
														</div>
													</footer>
													<div class="comment-content">
														<p>No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves.</p>
													</div>
													<div class="reply">
														<a rel="nofollow" class="comment-reply-link" href="#" title="Reply">Reply</a>
													</div>
												</div>
											</li>
										</ol>
									</li>
									<li class="comment byuser comment-author-admin bypostauthor even thread-odd thread-alt depth-1">
										<div class="comment-body">
											<footer class="comment-meta">
												<div class="comment-author vcard">
													<img alt="img" src="http://via.placeholder.com/70x70" class="avatar avatar-72 photo"/>
													<b class="fn">Giana Blankard</b>
												</div>
												<div class="comment-metadata">
													<a href="#">16 hours ago</a>											
												</div>
											</footer>
											<div class="comment-content">
												<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</p>
											</div>
											<div class="reply">
												<a rel="nofollow" class="comment-reply-link" href="#" title="Reply">Reply</a>
											</div>
										</div>
									</li>
								</ol> -->
								<!-- comment-list /- -->
								<!-- Comment Form -->
								<!-- <div class="comment-respond">
									<h2 class="comment-reply-title">Leave a Reply</h2>
									<form method="post" class="comment-form">
										<p class="comment-form-author">
											<input id="author" name="author" placeholder="Name" size="30" maxlength="245" required="required" type="text"/>
										</p>
										<p class="comment-form-email">
											<input id="email" name="email" placeholder="Email" required="required" type="email"/>
										</p>
										<p class="comment-form-url">
											<input id="url" name="url" placeholder="Website" required="required" type="url"/>
										</p>
										<p class="comment-form-comment">
											<textarea id="comment" name="comment" placeholder="Enter your comment here..." rows="8" required="required"></textarea>
										</p>
										<p class="form-submit">
											<input name="submit" class="submit" value="Post Comment" type="submit"/>
										</p>
									</form>
								</div> -->
								<!-- Comment Form /- -->
							<!-- </div> -->
							<!-- Comment Area /- -->
                        </div>
@endsection