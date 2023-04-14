<!DOCTYPE html>
<html lang="zxx">

<head>
	<!--====== Required meta tags ======-->
	<meta charset="utf-8" />
	<meta name="description" content="" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--====== Title ======-->
	<title>Explore the Best CPA Coaching in India | CPA course details</title>
	<meta name="description" content="if you are looking for the best CPA coaching in India, then look no further AKPIS Provide Best cpa coaching in India | Certified Public Accountant | US CPA |Cpa course | Best cpa coaching in delhi">

	<meta name="keywords" content="cpa course,best cpa institute in india,best cpa coaching in india,best institute for cpa in india,cpa coaching,cpa coaching near me,certified public accountant,cpa exams in india,cpa jobs,cpa license,cpa salary,cpa training,cpa vs ca,us cpa,cpa course fees,cpa course in indi,cpa course in india fees,cpa course details in india,cpa course details,can i do cpa after 12th,AKPIS ">

	<meta name="subject" content="cpa course,best cpa institute in india,best cpa coaching in india,best institute for cpa in india,cpa coaching,cpa coaching near me,certified public accountant,cpa exams in india,cpa jobs,cpa license,cpa salary,cpa training,cpa vs ca,us cpa,cpa course fees,cpa course in indi,cpa course in india fees,cpa course details in india,cpa course details,can i do cpa after 12th,AKPIS">

	<!--====== Favicon Icon ======-->
	<link rel="shortcut icon" href="https://akpisinternational.com/bk//akpis_assets/images/favicon.png" type="image/x-icon">
	<!--====== Google Fonts ======-->
	<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;500;600;700&amp;family=Oswald:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">

	<!--====== Flaticon ======-->
	<link rel="stylesheet" href="https://akpisinternational.com/bk//akpis_assets/css/flaticon.min.css">
	<!--====== Font Awesome ======-->
	<link rel="stylesheet" href="https://akpisinternational.com/bk//akpis_assets/css/font-awesome-5.9.0.min.css">
	<!--====== Bootstrap ======-->
	<link rel="stylesheet" href="https://akpisinternational.com/bk//akpis_assets/css/bootstrap-4.5.3.min.css">
	<!--====== Magnific Popup ======-->
	<link rel="stylesheet" href="https://akpisinternational.com/bk//akpis_assets/css/magnific-popup.min.css">
	<!--====== Nice Select ======-->
	<link rel="stylesheet" href="https://akpisinternational.com/bk//akpis_assets/css/nice-select.min.css">
	<!--====== jQuery UI ======-->
	<link rel="stylesheet" href="https://akpisinternational.com/bk//akpis_assets/css/jquery-ui.min.css">
	<!--====== Animate ======-->
	<link rel="stylesheet" href="https://akpisinternational.com/bk//akpis_assets/css/animate.min.css">
	<!--====== Slick ======-->
	<link rel="stylesheet" href="https://akpisinternational.com/bk//akpis_assets/css/slick.min.css">
	<!--====== Main Style ======-->
	<link rel="stylesheet" href="https://akpisinternational.com/bk//akpis_assets/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

</head>

<body class="home-one side-content-visible">
	<div class="page-wrapper">
		<!-- Team Section Start -->
		<section class="team-setion-two bg-lighter rel z-1 pt-80 rpt-90 pb-50 rpb-40">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="section-title text-center mb-55">
							<span class="sub-title-two"></span>
							<h2>Our Toppers </h2>
						</div>
					</div>
				</div>
				<ul class="nav faqs-tab mb-40">
					<?php
					  foreach($categories as $val):
					?>
					<li><a class="tablinks" onclick="openCity(event, '<?php echo $val['name']; ?>')" id="defaultOpen"><?php echo $val['name']; ?></a></li>
					<?php endforeach; ?>

				</ul>
				<?php
				   foreach($categories as $val){
					$CI = & get_instance();
					$datas = $CI->getTopper($val['category_id']);
					
				?>
				<div id="<?php echo $val['name']; ?>" class="tabcontent">
					<section class="about-section-three">
						<div class="container">
							<div class="row large-gap align-items-center">
								<?php
								  foreach($datas as $data){
								?>
								<div class="col-lg-3 col-md-4 col-sm-6">
									<div class="team-member-two wow fadeInUp delay-0-2s">
										<div class="image">
											<img src="<?php echo BASE_URL.$data['image_url'].$data['image']; ?>" alt="Team Member">
										</div>
										<div class="member-description">
											<h4 style="font-weight: 900;color: #0c445f;/* background: #f28f18; */padding: 2px 8px;/* border-radius: 10px; *//* width: 54%; */text-align: center;font-size: 34px;margin: auto;margin-top: -13px;"><?php echo $data['name']; ?></h4>
											<h4 style="font-weight: 600;color: orange;/* background: #f28f18; *//* padding: 2px 8px; *//* border-radius: 10px; */width: 81%;text-align: center;font-size: 17px;margin: auto;margin-top: -2px;"><?php echo $data['description']; ?></h4>
											<!--<span>Ryan International </span><span> Board:97.40% </span> <span> AIR - 110</span>-->
										</div>
									</div>
								</div>
								<?php } ?>
								
							</div>
						</div>
					</section>
				</div>
				<?php }  ?>

				<div id="CMA" class="tabcontent">
					<section class="about-section-three">
						<div class="container">
							<div class="row large-gap align-items-center">
								<div class="col-lg-3 col-md-4 col-sm-6">
									<div class="team-member-two wow fadeInUp delay-0-2s">
										<div class="image">
											<img src="https://akpisinternational.com/bk//akpis_assets/images/about/01.png" alt="Team Member">
										</div>
										<div class="member-description">
											<h4 style="font-weight: 900;color: #0c445f;/* background: #f28f18; */padding: 2px 8px;/* border-radius: 10px; *//* width: 54%; */text-align: center;font-size: 34px;margin: auto;margin-top: -13px;">Ish </h4>
											<h4 style="font-weight: 600;color: orange;/* background: #f28f18; *//* padding: 2px 8px; *//* border-radius: 10px; */width: 81%;text-align: center;font-size: 17px;margin: auto;margin-top: -2px;">ENROLLED AGENT</h4>
											<!--<span>Ryan International </span><span> Board:97.40% </span> <span> AIR - 110</span>-->
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6">
									<div class="team-member-two wow fadeInUp delay-0-2s">
										<div class="image">
											<img src="https://akpisinternational.com/bk//akpis_assets/images/about/02.png" alt="Team Member">
										</div>
										<div class="member-description">
											<h4 style="font-weight: 900;color: #0c445f;/* background: #f28f18; */padding: 2px 8px;/* border-radius: 10px; *//* width: 54%; */text-align: center;font-size: 34px;margin: auto;margin-top: -13px;">Ritu </h4>
											<h4 style="font-weight: 600;color: orange;/* background: #f28f18; *//* padding: 2px 8px; *//* border-radius: 10px; */width: 81%;text-align: center;font-size: 17px;margin: auto;margin-top: -2px;">ENROLLED AGENT</h4>
											<!--<span>Ryan International </span><span> Board:97.40% </span> <span> AIR - 110</span>-->
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6">
									<div class="team-member-two wow fadeInUp delay-0-2s">
										<div class="image">
											<img src="https://akpisinternational.com/bk//akpis_assets/images/about/03.png" alt="Team Member">
										</div>
										<div class="member-description">
											<h4 style="font-weight: 900;color: #0c445f;/* background: #f28f18; */padding: 2px 8px;/* border-radius: 10px; *//* width: 54%; */text-align: center;font-size: 34px;margin: auto;margin-top: -13px;">Himanshi </h4>
											<h4 style="font-weight: 600;color: orange;/* background: #f28f18; *//* padding: 2px 8px; *//* border-radius: 10px; */width: 81%;text-align: center;font-size: 17px;margin: auto;margin-top: -2px;">ENROLLED AGENT</h4>
											<!--<span>Ryan International </span><span> Board:97.40% </span> <span> AIR - 110</span>-->
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6">
									<div class="team-member-two wow fadeInUp delay-0-2s">
										<div class="image">
											<img src="https://akpisinternational.com/bk//akpis_assets/images/about/04.png" alt="Team Member">
										</div>
										<div class="member-description">
											<h4 style="font-weight: 900;color: #0c445f;/* background: #f28f18; */padding: 2px 8px;/* border-radius: 10px; *//* width: 54%; */text-align: center;font-size: 34px;margin: auto;margin-top: -13px;">Karan</h4>
											<h4 style="font-weight: 600;color: orange;/* background: #f28f18; *//* padding: 2px 8px; *//* border-radius: 10px; */width: 81%;text-align: center;font-size: 17px;margin: auto;margin-top: -2px;">ENROLLED AGENT</h4>
											<!--<span>Ryan International </span><span> Board:97.40% </span> <span> AIR - 110</span>-->
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>

				<div style="margin-right: 0px;" id="ACCA" class="tabcontent">
					<section class="about-section-three">
						<div class="container">
							<div class="row large-gap align-items-center">
								<div class="col-lg-3 col-md-4 col-sm-6">
									<div class="team-member-two wow fadeInUp delay-0-2s">
										<div class="image">
											<img src="https://akpisinternational.com/bk//akpis_assets/images/about/05.png" alt="Team Member">
										</div>
										<div class="member-description">
											<h4 style="font-weight: 900;color: #0c445f;/* background: #f28f18; */padding: 2px 8px;/* border-radius: 10px; *//* width: 54%; */text-align: center;font-size: 34px;margin: auto;margin-top: -13px;">Rishabh</h4>
											<h4 style="font-weight: 600;color: orange;/* background: #f28f18; *//* padding: 2px 8px; *//* border-radius: 10px; */width: 81%;text-align: center;font-size: 17px;margin: auto;margin-top: -2px;">CPA EXAM</h4>
											<!--<span>Ryan International </span><span> Board:97.40% </span> <span> AIR - 110</span>-->
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6">
									<div class="team-member-two wow fadeInUp delay-0-2s">
										<div class="image">
											<img src="https://akpisinternational.com/bk//akpis_assets/images/about/06.png" alt="Team Member">
										</div>
										<div class="member-description">
											<h4 style="font-weight: 900;color: #0c445f;/* background: #f28f18; */padding: 2px 8px;/* border-radius: 10px; *//* width: 54%; */text-align: center;font-size: 34px;margin: auto;margin-top: -13px;">Jasmine</h4>
											<h4 style="font-weight: 600;color: orange;/* background: #f28f18; *//* padding: 2px 8px; *//* border-radius: 10px; */width: 81%;text-align: center;font-size: 17px;margin: auto;margin-top: -2px;">ENROLLED AGENT</h4>
											<!--<span>Ryan International </span><span> Board:97.40% </span> <span> AIR - 110</span>-->
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6">
									<div class="team-member-two wow fadeInUp delay-0-2s">
										<div class="image">
											<img src="https://akpisinternational.com/bk//akpis_assets/images/about/07.png" alt="Team Member">
										</div>
										<div class="member-description">
											<h4 style="font-weight: 900;color: #0c445f;/* background: #f28f18; */padding: 2px 8px;/* border-radius: 10px; *//* width: 54%; */text-align: center;font-size: 34px;margin: auto;margin-top: -13px;">Akhil</h4>
											<h4 style="font-weight: 600;color: orange;/* background: #f28f18; *//* padding: 2px 8px; *//* border-radius: 10px; */width: 81%;text-align: center;font-size: 17px;margin: auto;margin-top: -2px;">ENROLLED AGENT</h4>
											<!--<span>Ryan International </span><span> Board:97.40% </span> <span> AIR - 110</span>-->
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6">
									<div class="team-member-two wow fadeInUp delay-0-2s">
										<div class="image">
											<img src="https://akpisinternational.com/bk//akpis_assets/images/about/08.png" alt="Team Member">
										</div>
										<div class="member-description">
											<h4 style="font-weight: 900;color: #0c445f;/* background: #f28f18; */padding: 2px 8px;/* border-radius: 10px; *//* width: 54%; */text-align: center;font-size: 34px;margin: auto;margin-top: -13px;">Vishan</h4>
											<h4 style="font-weight: 600;color: orange;/* background: #f28f18; *//* padding: 2px 8px; *//* border-radius: 10px; */width: 81%;text-align: center;font-size: 17px;margin: auto;margin-top: -2px;">ENROLLED AGENT</h4>
											<!--<span>Ryan International </span><span> Board:97.40% </span> <span> AIR - 110</span>-->
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>

				<div id="IFRS" class="tabcontent">
					<section class="about-section-three">
						<div class="container">
							<div class="row large-gap align-items-center">
								<div class="col-lg-3 col-md-4 col-sm-6">
									<div class="team-member-two wow fadeInUp delay-0-2s">
										<div class="image">
											<img src="https://akpisinternational.com/bk//akpis_assets/images/about/01.png" alt="Team Member">
										</div>
										<div class="member-description">
											<h4 style="font-weight: 900;color: #0c445f;/* background: #f28f18; */padding: 2px 8px;/* border-radius: 10px; *//* width: 54%; */text-align: center;font-size: 34px;margin: auto;margin-top: -13px;">Ish </h4>
											<h4 style="font-weight: 600;color: orange;/* background: #f28f18; *//* padding: 2px 8px; *//* border-radius: 10px; */width: 81%;text-align: center;font-size: 17px;margin: auto;margin-top: -2px;">ENROLLED AGENT</h4>
											<!--<span>Ryan International </span><span> Board:97.40% </span> <span> AIR - 110</span>-->
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6">
									<div class="team-member-two wow fadeInUp delay-0-2s">
										<div class="image">
											<img src="https://akpisinternational.com/bk//akpis_assets/images/about/02.png" alt="Team Member">
										</div>
										<div class="member-description">
											<h4 style="font-weight: 900;color: #0c445f;/* background: #f28f18; */padding: 2px 8px;/* border-radius: 10px; *//* width: 54%; */text-align: center;font-size: 34px;margin: auto;margin-top: -13px;">Ritu </h4>
											<h4 style="font-weight: 600;color: orange;/* background: #f28f18; *//* padding: 2px 8px; *//* border-radius: 10px; */width: 81%;text-align: center;font-size: 17px;margin: auto;margin-top: -2px;">ENROLLED AGENT</h4>
											<!--<span>Ryan International </span><span> Board:97.40% </span> <span> AIR - 110</span>-->
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6">
									<div class="team-member-two wow fadeInUp delay-0-2s">
										<div class="image">
											<img src="https://akpisinternational.com/bk//akpis_assets/images/about/03.png" alt="Team Member">
										</div>
										<div class="member-description">
											<h4 style="font-weight: 900;color: #0c445f;/* background: #f28f18; */padding: 2px 8px;/* border-radius: 10px; *//* width: 54%; */text-align: center;font-size: 34px;margin: auto;margin-top: -13px;">Himanshi </h4>
											<h4 style="font-weight: 600;color: orange;/* background: #f28f18; *//* padding: 2px 8px; *//* border-radius: 10px; */width: 81%;text-align: center;font-size: 17px;margin: auto;margin-top: -2px;">ENROLLED AGENT</h4>
											<!--<span>Ryan International </span><span> Board:97.40% </span> <span> AIR - 110</span>-->
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-6">
									<div class="team-member-two wow fadeInUp delay-0-2s">
										<div class="image">
											<img src="https://akpisinternational.com/bk//akpis_assets/images/about/04.png" alt="Team Member">
										</div>
										<div class="member-description">
											<h4 style="font-weight: 900;color: #0c445f;/* background: #f28f18; */padding: 2px 8px;/* border-radius: 10px; *//* width: 54%; */text-align: center;font-size: 34px;margin: auto;margin-top: -13px;">Karan</h4>
											<h4 style="font-weight: 600;color: orange;/* background: #f28f18; *//* padding: 2px 8px; *//* border-radius: 10px; */width: 81%;text-align: center;font-size: 17px;margin: auto;margin-top: -2px;">ENROLLED AGENT</h4>

										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>

			</div>
		</section>
		<script>
			function openCity(evt, cityName) {
				var i, tabcontent, tablinks;
				tabcontent = document.getElementsByClassName("tabcontent");
				for (i = 0; i < tabcontent.length; i++) {
					tabcontent[i].style.display = "none";
				}
				tablinks = document.getElementsByClassName("tablinks");
				for (i = 0; i < tablinks.length; i++) {
					tablinks[i].className = tablinks[i].className.replace(" active", "");
				}
				document.getElementById(cityName).style.display = "block";
				evt.currentTarget.className += " active";
			}

			// Get the element with id="defaultOpen" and click on it
			document.getElementById("defaultOpen").click();
		</script>






		<!-- Testimonial Section Start -->
		<!-- <section class="testimonial-three rel py-80">
            <div class="container">
               <div class="row align-items-center justify-content-between">
                    <div class="col-lg-5">
                        <div class="testimonial-three-content rel z-1 rmb-55 wow fadeInUp delay-0-2s">
                            <div class="section-title mb-20">
                                
                                <h2>OUR
                                    RESULT</h2>
                            </div>
                            <p>Some of our performer who got their medical admission in top colleges.</p>
                            <a href="#" class="read-more color-two mt-5">View more <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testimonial-three-wrap rel z-1 wow fadeInUp delay-0-4s">
                            <div class="testimonial-three-item">
                                <div class="image">
                                    <img src="https://www.torqueclasses.in/https://akpisinternational.com/bk//akpis_assets/img/student/2019/Ayushman.png" alt="Author">
                                </div>
                                <div class="content">
                                    <div class="quality-rating">
                                        <h4>Good Quality</h4>
                                        <div class="ratting">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <p> Our top achievers and Pride of Torque Classes.</p>
                                    <h5>VMSR</h5>
                                    <span class="designation">Business Manager</span>
                                </div>
                            </div>
                            <div class="testimonial-three-item">
                                <div class="image">
                                    <img src="https://www.torqueclasses.in/https://akpisinternational.com/bk//akpis_assets/img/student/2019/Ayushman.png" alt="Author">
                                </div>
                                <div class="content">
                                    <div class="quality-rating">
                                        <h4>Good Quality</h4>
                                        <div class="ratting">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <p> Our top achievers and Pride of Torque Classes.</p>
                                    <h5>VMSR</h5>
                                    <span class="designation">Business Manager</span>
                                </div>
                            </div>
                            <div class="testimonial-three-item">
                                <div class="image">
                                    <img src="https://www.torqueclasses.in/https://akpisinternational.com/bk//akpis_assets/img/student/2019/Ayushman.png" alt="Author">
                                </div>
                                <div class="content">
                                    <div class="quality-rating">
                                        <h4>Good Quality</h4>
                                        <div class="ratting">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <p> Our top achievers and Pride of Torque Classes.</p>
                                    <h5>VMSR</h5>
                                    <span class="designation">Business Manager</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
		<!-- Testimonial Section End -->



		<!--Start of Tawk.to Script-->
		<!--End of Tawk.to Script-->


		<!-- Footer Area Start -->
		<!-- Footer Area End -->

	</div>
	<!--End pagewrapper-->


	<!--====== Jquery ======-->
	<script src="https://akpisinternational.com/bk//akpis_assets/js/jquery-3.6.0.min.js"></script>
	<!--====== Bootstrap ======-->
	<script src="https://akpisinternational.com/bk//akpis_assets/js/bootstrap.min.js"></script>
	<!--====== Appear Js ======-->
	<script src="https://akpisinternational.com/bk//akpis_assets/js/appear.min.js"></script>
	<!--====== Slick ======-->
	<script src="https://akpisinternational.com/bk//akpis_assets/js/slick.min.js"></script>
	<!--====== jQuery UI ======-->
	<script src="https://akpisinternational.com/bk//akpis_assets/js/jquery-ui.min.js"></script>
	<!--====== Isotope ======-->
	<script src="https://akpisinternational.com/bk//akpis_assets/js/isotope.pkgd.min.js"></script>
	<!--====== Circle Progress bar ======-->
	<script src="https://akpisinternational.com/bk//akpis_assets/js/circle-progress.min.js"></script>
	<!--====== Images Loader ======-->
	<script src="https://akpisinternational.com/bk//akpis_assets/js/imagesloaded.pkgd.min.js"></script>
	<!--====== Nice Select ======-->
	<script src="https://akpisinternational.com/bk//akpis_assets/js/jquery.nice-select.min.js"></script>
	<!--====== Magnific Popup ======-->
	<script src="https://akpisinternational.com/bk//akpis_assets/js/jquery.magnific-popup.min.js"></script>
	<!--  WOW Animation -->
	<script src="https://akpisinternational.com/bk//akpis_assets/js/wow.min.js"></script>
	<!-- Custom script -->
	<script src="https://akpisinternational.com/bk//akpis_assets/js/script.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<script>
		$(".slick-slider-home-blog").slick({
			slidesToShow: 3,
			infinite: false,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 2000,
			dots: false,
			arrows: false,
		});
	</script>
</body>

</html>
