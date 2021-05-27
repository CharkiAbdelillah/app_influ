<template>

<div>

    <header id="header"><!--header-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li>
									<router-link to="/user/home2">
                                    	Home
                                	</router-link>
								</li>
								<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li> 
								<li><a href="404.html">404</a></li>
								<li><a href="contact-us.html">Contact</a></li>
							</ul>
						</div>
					</div>
					<!-- <div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div> -->
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>3</span>WDEV</h1>
									<h2>FIND INFLUENCERS</h2>
									<p>If you are a business or entity looking for data then we have solutions for you with our query builder. Filter the results to get laser targeted queries delivered to you.</p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/hslide1.png" class="girl img-responsive" alt="" />
									<!-- <img src="images/home/logo3_miniv.png"  class="pricing" alt="" /> -->
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>3</span>WDEV</h1>
									<h2>GROW YOU CHANNEL</h2>
									<p>Allow our YouTube-certified experts to take a look at your channel and bring it to new heights. We'll take you step by step on how to grow your channel!</p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/slide2.png" class="girl img-responsive" alt="" />
									<!-- <img src="images/home/logo.png"  class="pricing" alt="" /> -->
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>3</span>WDEV</h1>
									<h2>Simplified Analytics !</h2>
									<p>Social Blade gives all users access to our public database which, using advanced technology, is able to provide you with global analytics for any content creator</p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/hslide3.png" class="girl img-responsive" alt="" />
									<!-- <img src="images/home/logo3_miniv.png" align="left" class="pricing" alt="" /> -->
								</div>
							</div>
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Recherche</h2>
						<div class="price-range"><!--price-range-->	
								<RadioGroup v-model="select_search">
									<Radio label="Nom">
										<span>Nom</span>
									</Radio>
									<Radio label="Prenom">
										<span>Prenom</span>
									</Radio>
									<Radio label="Ville">
										<Icon type="ios-pin"/>
										<span>Ville</span>
									</Radio>
									<Radio label="All">
										<span>All</span>
									</Radio>
								</RadioGroup>	
							<div class="well text-center">
								 <input v-model="filterNom" style="text-align: center" :placeholder="select_search"/>
							</div>
						</div><!--/price-range-->
						<h2>Domaine</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Instagram
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul v-for="(v,i) in this.Domoptions" :key="i">
											<li @click="selectedTypeDomFun(v.id,'insta')"><a href="#person_target">{{v.nom}}</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Facebook
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul v-for="(v,i) in this.Domoptions" :key="i">
											<li @click="selectedTypeDomFun(v.id,'fb')"><a href="#person_target">{{v.nom}}</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#snap">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Snapchat
										</a>
									</h4>
								</div>
								<div id="snap" class="panel-collapse collapse">
									<div class="panel-body">
										<ul v-for="(v,i) in this.Domoptions" :key="i">
											<li @click="selectedTypeDomFun(v.id,'snap')"><a href="#person_target">{{v.nom}}</a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#ytb">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Youtube
										</a>
									</h4>
								</div>
								<div id="ytb" class="panel-collapse collapse">
									<div class="panel-body">
										<ul v-for="(v,i) in this.Domoptions" :key="i">
											<li @click="selectedTypeDomFun(v.id,'ytb')"><a href="#person_target">{{v.nom}}</a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">test</a></h4>
								</div>
							</div>
						</div><!--/category-products-->
						<h2>select number</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear1">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Instagram
										</a>
									</h4>
								</div>
								<div id="sportswear1" class="panel-collapse collapse">
									<div class="panel-body">
											<RadioGroup v-model="nombre.selectNumInsta">
												<Radio label="Like">
													<span>Like</span>
												</Radio>
												<Radio label="Abonne">
													<span>Abonne</span>
												</Radio>
												<Radio label="Comm">
													<span>Comm</span>
												</Radio>
											</RadioGroup>	
											<div class="text-center">
											<!-- <Slider v-model="valueInsta" range></Slider> -->
											<input type="range" v-model="valueInsta[0]" min="0" max="10000" step="10"/> 
											min : {{this.valueInsta[0]}}
											<input type="range" v-model="valueInsta[1]" min="0" max="10000" step="10"/> 
											max : {{this.valueInsta[1]}}
											</div>
											<label for="">Followers</label>
											<!-- <div class="text-center"> -->
												<ul class="nav nav-pills nav-stacked">
													<li @click="selectedFollowers(folow1,'insta')"><a href="#person_target">Nano(1k-10k)</a></li>
													<li @click="selectedFollowers(folow2,'insta')"><a href="#person_target">Micro(10k-50k)</a></li>
													<li @click="selectedFollowers(folow3,'insta')"><a href="#person_target">Mid-tier(50k-500k)</a></li>
													<li @click="selectedFollowers(folow4,'insta')"><a href="#person_target">Macro(500k-1m)</a></li>
													<li @click="selectedFollowers(folow5,'insta')"><a href="#person_target">Mega(1m et +)</a></li>
												</ul>
											<!-- <input v-model="this.selectNumInsta" class="text-center" style="text-align: center" :placeholder="select_search"/> -->
											<!-- </div> -->
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens1">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Facebook
										</a>
									</h4>
								</div>
								<div id="mens1" class="panel-collapse collapse">
									<div class="panel-body">
											<RadioGroup v-model="nombre.selectNumFb">
												<Radio label="Like">
													<span>Like</span>
												</Radio>
												<Radio label="Abonne">
													<span>Abonne</span>
												</Radio>
												<Radio label="Comm">
													<span>Comm</span>
												</Radio>
											</RadioGroup>	
											<div class="text-center">
													<input type="range" v-model="valueFb[0]" min="0" max="10000" step="10"/> 
												min : {{this.valueFb[0]}}
												<input type="range" v-model="valueFb[1]" min="0" max="10000" step="10"/> 
												max : {{this.valueFb[1]}}
											</div>
											<label for="">Followers</label>
											<!-- <div class="text-center"> -->
												<ul class="nav nav-pills nav-stacked">
													<li @click="selectedFollowers(folow1,'fb')"><a href="#person_target">Nano(1k-10k)</a></li>
													<li @click="selectedFollowers(folow2,'fb')"><a href="#person_target">Micro(10k-50k)</a></li>
													<li @click="selectedFollowers(folow3,'fb')"><a href="#person_target">Mid-tier(50k-500k)</a></li>
													<li @click="selectedFollowers(folow4,'fb')"><a href="#person_target">Macro(500k-1m)</a></li>
													<li @click="selectedFollowers(folow5,'fb')"><a href="#person_target">Mega(1m et +)</a></li>
												</ul>
											<!-- <input v-model="this.selectNumInsta" class="text-center" style="text-align: center" :placeholder="select_search"/> -->
											<!-- </div> -->
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens2">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Snapchat
										</a>
									</h4>
								</div>
								<div id="mens2" class="panel-collapse collapse">
									<div class="panel-body">
											<RadioGroup v-model="nombre.selectNumSnap">
												<Radio label="Like">
													<span>Like</span>
												</Radio>
												<Radio label="Abonne">
													<span>Abonne</span>
												</Radio>
												<Radio label="Comm">
													<span>Comm</span>
												</Radio>
											</RadioGroup>	
											<div class="text-center">
												<input type="range" v-model="valueSnap[0]" min="0" max="10000" step="10"/> 
												min : {{this.valueSnap[0]}}
												<input type="range" v-model="valueSnap[1]" min="0" max="10000" step="10"/> 
												max : {{this.valueSnap[1]}}
											</div>
											<label for="">Followers</label>
											<!-- <div class="text-center"> -->
												<ul class="nav nav-pills nav-stacked">
													<li @click="selectedFollowers(folow1,'snap')"><a href="#person_target">Nano(1k-10k)</a></li>
													<li @click="selectedFollowers(folow2,'snap')"><a href="#person_target">Micro(10k-50k)</a></li>
													<li @click="selectedFollowers(folow3,'snap')"><a href="#person_target">Mid-tier(50k-500k)</a></li>
													<li @click="selectedFollowers(folow4,'snap')"><a href="#person_target">Macro(500k-1m)</a></li>
													<li @click="selectedFollowers(folow5,'snap')"><a href="#person_target">Mega(1m et +)</a></li>
												</ul>
											<!-- <input v-model="this.selectNumInsta" class="text-center" style="text-align: center" :placeholder="select_search"/> -->
											<!-- </div> -->
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#womens3">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Youtube
										</a>
									</h4>
								</div>
								<div id="womens3" class="panel-collapse collapse">
									<div class="panel-body">
											<RadioGroup v-model="nombre.selectNumYtb">
												<Radio label="Like">
													<span>Like</span>
												</Radio>
												<Radio label="Abonne">
													<span>Abonne</span>
												</Radio>
												<Radio label="Comm">
													<span>Comm</span>
												</Radio>
											</RadioGroup>	
											<div class="text-center">
												<input type="range" v-model="valueYtb[0]" min="0" max="10000" step="10"/> 
												min : {{this.valueYtb[0]}}
												<input type="range" v-model="valueYtb[1]" min="0" max="10000" step="10"/> 
												max : {{this.valueYtb[1]}}
											</div>
											<label for="">Followers</label>
											<!-- <div class="text-center"> -->
												<ul class="nav nav-pills nav-stacked">
													<li @click="selectedFollowers(folow1,'ytb')"><a href="#person_target">Nano(1k-10k)</a></li>
													<li @click="selectedFollowers(folow2,'ytb')"><a href="#person_target">Micro(10k-50k)</a></li>
													<li @click="selectedFollowers(folow3,'ytb')"><a href="#person_target">Mid-tier(50k-500k)</a></li>
													<li @click="selectedFollowers(folow4,'ytb')"><a href="#person_target">Macro(500k-1m)</a></li>
													<li @click="selectedFollowers(folow5,'ytb')"><a href="#person_target">Mega(1m et +)</a></li>
												</ul>
											<!-- <input v-model="this.selectNumInsta" class="text-center" style="text-align: center" :placeholder="select_search"/> -->
											<!-- </div> -->
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">test</a></h4>
								</div>
							</div>
						</div><!--/category-products-->					
						<div class="brands_products"><!--brands_products-->
							<h2>Historique</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked" v-for="(histo,index) in this.his "  :key="index">
									<!-- <li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li> -->
									<li @click="selectedHis(histo.id)"><a href="#person_target"> <span class="pull-right">(50)</span>{{histo.nom}}</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
						
							<!--price-range-->
						<!-- <div class="price-range">
							<h2>number test</h2>
							<div class="well text-center">
									<label for="vol">Price (between 0 and 1000):</label>
									<input type="range" v-model="range" min="0" max="1000" step="10"/> 
									Selected : {{this.range}}
									<Slider v-model="value" range></Slider>
							</div>
						
						</div> -->
						<!--/price-range-->
							
					</div>
				</div>
				
				<div class="col-sm-9 padding-right" id="person_target">
					<div class="features_items" ><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						
						   <div class="col-sm-4" v-for="(user1,index) in filteredPersonnes"  :key="index">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
                                            <img :src="user1.photo" alt="" />
											<router-link :to="{name:'UserDetails',params:{user1,date_per:user1.date}}">
												<p @click="passId(user1.id)">{{user1.nom}}</p>
											</router-link>
											<!-- <router-link :to="{name:'UserDetails',params:{id:user1.id}}">
												<p>{{user1.nom}}</p>
											</router-link> -->
											<a href="#" class="btn btn-default add-to-cart"><i class=""></i>test</a>
										</div>
										<!-- <div class="product-overlay">
											<div class="overlay-content">
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div> -->
								</div>
							</div>
						</div>
					</div><!--features_items-->
					<pagination :data="this.personnes.perso" @pagination-change-page="getResults" class="mt-5" style="bgcolor:black;"></pagination>
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>3</span>WDEV</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
						</div>
					</div>
					<div class="col-sm-7" >
						<div class="col-sm-3" v-for="(pp,index) in this.personnes4.data"  :key="index">
							<div class="video-gallery text-center">
								<router-link :to="{name:'UserDetails'}">
									<div class="iframe-img" @click="passId(pp.id)">
										<img :src="pp.photo" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</router-link>
								<p>{{pp.nom}}</p>
								<h2>{{pp.date}}</h2>
							</div>
						</div>
						
						<!-- <div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe2.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe3.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe4.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div> -->
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Order Status</a></li>
								<li><a href="#">Change Location</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">T-Shirt</a></li>
								<li><a href="#">Mens</a></li>
								<li><a href="#">Womens</a></li>
								<li><a href="#">Gift Cards</a></li>
								<li><a href="#">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
								<li><a href="#">Billing System</a></li>
								<li><a href="#">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 CHARKI Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
	</footer><!--/Footer-->
</div>
</template>
<script>
//     import { mdbTbl, mdbTblHead, mdbTblBody } from 'mdbvue';

    export default {
        data(){
            return{
                personnes:{},
				personnes4:{},
                personnes2:{},
                his:{},
                nom:'',
                id:[],
                selectedHistorique:'all',
                selectedInstagram:'all',
                selectedYoutube:'all',
                selectedFacebook:'all',
                selectedSnapchat:'all',
				selectedInstagramFL:'all',
                selectedYoutubeFL:'all',
                selectedFacebookFL:'all',
                selectedSnapchatFL:'all',
                folow1:'Nano(1k-10k)',
                folow2:'Micro(10k-50k)',
                folow3:'Mid-tier(50k-500k)',
                folow4:'Macro(500k-1m)',
                folow5:'Mega(1m et +)',
                Domoptions:{},
                personneid:'',
				select_search:'all',
				nombre:{
					selectNumInsta:'all',
					selectNumFb:'all',
					selectNumYtb:'all',
					selectNumSnap:'all',
				},
				valueInsta: [0, 0],
				valueFb: [0, 0],
				valueYtb: [0, 0],
				valueSnap: [0, 0],
				value: [0, 0],
                filterNom: undefined,
				selectedType:'All',
				selectedTypeDomaine:'',
				selectedTypeFollowers:'',
                range:0,
            }
        },
        created(){
			// this.$store.dispatch('getPosts');
            this.getHistorique();
            this.getPersonnes();
            this.getPersonnes2();
			this.getPersonnes4();
			this.getDomaine();
        },
          mounted() {
			this.$store.dispatch('getPosts');
			// // this.$store.dispatch('passIdd',idd);
            // console.log('moooonted');
		},
        methods:{
			passId(id){
				this.$store.commit('passId',id)
				// this.$store.dispatch('getPosts');
			},
            getHistorique(){
        		axios.get('/api/personneHistorique').then(response=>{
                    console.log('histo : '+response.data);
                    this.his=response.data;
                })
                .catch(error=>{console.log(error)})
      		},
			getDomaine(){
        		axios.get('/api/personneTypeDomaine').then(response=>{
                    console.log(response.data);
                    this.Domoptions=response.data;
                })
                .catch(error=>{console.log(error)})
      		},
            getPersonnes(){
                // alert('hello1');
                // console.log('debut');
                axios.get('/api/personne').then(response=>{
                    console.log('dataaaaaa: '+response.data);
                    this.personnes=response.data;
                    console.log('fin');
                    // this.lastId=response.data[0].id;
                    // this.lastId2=personnes.data[0].id;
                })
                .catch(error=>{console.log(error)})
            },
            getPersonnes2(){
                axios.get('/api/personneWithoutPagination').then(response=>{
                    console.log('daaaataaaa2 : '+response.data);
                    this.personnes2=response.data;
                    console.log('peeeeeeeer2 : '+response.data);
                    // this.personnes2=response.data;
                    this.lastId=response.data[0].id;
                    this.lastId2=personnes.data[0].id;
                })
                .catch(error=>{console.log(error)})
            },
			getPersonnes4(){
                axios.get('/api/personneLastFour').then(response=>{
                    this.personnes4=response.data;
                })
                .catch(error=>{console.log(error)})
            },
            getResults(page = 1) {
			axios.get('/api/personne?page=' + page)
				.then(response => {
					this.personnes = response.data;
				});
		    },
            selectedHis(id){
                this.selectedHistorique=id;
				this.selectedType="historique";
            },
			selectedTypeDomFun(id,type){
				this.selectedYoutube=id;
				this.selectedInstagram=id;
				this.selectedSnapchat=id;
				this.selectedFacebook=id;
				this.selectedTypeDomaine=type;
				this.selectedType="domaine";
			},
			selectedFollowers(str,type){
				this.selectedType="followers";
				this.selectedTypeFollowers=type;
                this.selectedInstagramFL=str;
				this.selectedYoutubeFL=str;
				this.selectedFacebookFL=str;
				this.selectedSnapchatFL=str;
            },
            refresh(personnes){
                this.getPersonnes();
            },
    },
    computed:{
        filteredPersonnes () {
            if(this.personnes.perso){
                console.log('deeeeeeeeeeeefined');
                var per = this.personnes.perso.data;
    	        var per2 = this.personnes2.perso
            }
    	
            if (this.filterNom && this.select_search!=='all') {
				if(this.select_search=='Nom'){
					per2 = per2.filter((p) => {
                    	return p.nom.indexOf(this.filterNom) !== -1
                	})
					
				}
				else if(this.select_search=='Prenom'){
					per2 = per2.filter((p) => {
                    	return p.prenom.indexOf(this.filterNom) !== -1
                	})
				}
				else if(this.select_search=='Ville'){
					per2 = per2.filter((p) => {
                    	return p.ville.indexOf(this.filterNom) !== -1
                	})
				}
				else{
					this.selectedType="All";
					this.select_search=='All';
					return per;
				}
				
                return per2;
				
            }
			else if( this.valueInsta[1]!=0 && this.valueInsta[0]!=0) {
				if(this.nombre.selectNumInsta =='Like'){
					per2 = per2.filter((p) => {
								if(p.instagram!=null){
									return p.instagram.like > Number(this.valueInsta[0]) && p.instagram.like<Number(this.valueInsta[1]);
								}
					})
				}
				else if(this.nombre.selectNumInsta =='Abonne'){
					per2 = per2.filter((p) => {
								if(p.instagram!=null){
									return p.instagram.nombre_abonne > Number(this.valueInsta[0]) && p.instagram.nombre_abonne<Number(this.valueInsta[1]);
								}
					})
				}
				else if(this.nombre.selectNumInsta =='Comm'){
					per2 = per2.filter((p) => {
								if(p.instagram!=null){
									return p.instagram.commentaire > Number(this.valueInsta[0]) && p.instagram.commentaire<Number(this.valueInsta[1]);
								}
					})
				}
				return per2;
            }
			else if( this.valueFb[1]!==0 && this.valueFb[0]!==0) {
				if(this.nombre.selectNumFb =='Like'){
					per2 = per2.filter((p) => {
								if(p.facebook!=null){
									return p.facebook.like > Number(this.valueFb[0]) && p.facebook.like<Number(this.valueFb[1]);
								}
					})
				}
				else if(this.nombre.selectNumFb =='Abonne'){
					per2 = per2.filter((p) => {
								if(p.facebook!=null){
									return p.facebook.nombre_abonne > Number(this.valueFb[0]) && p.facebook.nombre_abonne<Number(this.valueFb[1]);
								}
					})
				}
				else if(this.nombre.selectNumFb =='Comm'){
					per2 = per2.filter((p) => {
								if(p.facebook!=null){
									return p.facebook.commentaire > Number(this.valueFb[0]) && p.facebook.commentaire<Number(this.valueFb[1]);
								}
					})
				}
				return per2;
            }
			else if( this.valueYtb[1]!==0 && this.valueYtb[0]!==0) {
				if(this.nombre.selectNumYtb =='Like'){
					per2 = per2.filter((p) => {
								if(p.youtube!=null){
									return p.youtube.like > Number(this.valueYtb[0]) && p.youtube.like<Number(this.valueYtb[1]);
								}
					})
				}
				else if(this.nombre.selectNumYtb =='Abonne'){
					per2 = per2.filter((p) => {
								if(p.youtube!=null){
									return p.youtube.nombre_abonne > Number(this.valueYtb[0]) && p.youtube.nombre_abonne<Number(this.valueYtb[1]);
								}
					})
				}
				else if(this.nombre.selectNumYtb =='Comm'){
					per2 = per2.filter((p) => {
								if(p.youtube!=null){
									return p.youtube.commentaire > Number(this.valueYtb[0]) && p.youtube.commentaire<Number(this.valueYtb[1]);
								}
					})
				}

				return per2;
            }
			else if( this.valueSnap[1]!==0 && this.valueSnap[0]!==0) {
				console.log('1er Snap : '+this.valueSnap[0]+' 2eme Snap : '+this.valueSnap[1]);
				if(this.nombre.selectNumSnap =='Like'){
					per2 = per2.filter((p) => {
								if(p.snapchat!=null){
									return p.snapchat.like > Number(this.valueSnap[0]) && p.snapchat.like<Number(this.valueSnap[1]);
								}
					})
				}
				else if(this.nombre.selectNumSnap =='Abonne'){
					per2 = per2.filter((p) => {
								if(p.snapchat!=null){
									return p.snapchat.nombre_abonne > Number(this.valueSnap[0]) && p.snapchat.nombre_abonne<Number(this.valueSnap[1]);
								}
					})
				}
				else if(this.nombre.selectNumSnap =='Comm'){
					per2 = per2.filter((p) => {
								if(p.snapchat!=null){
									return p.snapchat.commentaire > Number(this.valueSnap[0]) && p.snapchat.commentaire<Number(this.valueSnap[1]);
								}
					})
				}
				// this.nombre.selectNumSnap='all';
				return per2;
            }
			// ********* filter nombre ************
			else
			switch (this.selectedType)
				{
				case "historique":
					per2 = per2.filter((p) => {
								let foundHistorique = p.historique.findIndex((c) => {
								return c.id === this.selectedHistorique
					})
						return foundHistorique !== -1
					})
						this.selectedHistorique='all';
                	return per2;
				case "domaine":
					switch(this.selectedTypeDomaine){
							case "fb":
							// console.log('fbbbbb');
							per2 = per2.filter((p) => {
								var jsonStr = JSON.stringify(p);
								// console.log('fb pers : '+jsonStr);
								// alert('fb per '+p);
										if(p.facebook!=null){
											// alert('fb per '+p.nom);
											let foundDomFb = p.facebook.domaine.findIndex((c) => {
												// alert('fb id '+c.id+' = '+this.selectedFacebook);
											return c.id === this.selectedFacebook
											})
											// console.log('fbbb1 : '+this.selectedFacebook);
											// this.selectedFacebook='all';
											// console.log('fbbb2 : '+this.selectedFacebook);

											return foundDomFb !== -1
										}
							})
							// this.selectedFacebook='all';
							// this.selectedInstagram='all';
							return per2;	
						
						case "insta": 
							per2 = per2.filter((p) => {
							// alert('doom1 : '+p);
							var jsonStr = JSON.stringify(p);
							// console.log('doooooooom: '+jsonStr);
						if(jsonStr.instagram){
							// console.log('doooooooom: '+jsonStr.instagram);
						}
								if(p.instagram!=null){
									// alert('nom dom insta : '+p.nom)
									// console.log('doooooooom2222: '+p.instagram);
									let foundDomInsta = p.instagram.domaine.findIndex((c) => {
										// console.log('doooooooom2222333333: '+c.id);
									return c.id === this.selectedInstagram
									})
									// this.selectedInstagram='all';
									// alert('foundDomInsta : '+foundDomInsta);
									return foundDomInsta !== -1
									}
						})
						return per2;
						break;
					case "ytb":
						per2 = per2.filter((p) => {
								if(p.youtube!=null){
									let foundDomYtb = p.youtube.domaine.findIndex((c) => {
									return c.id === this.selectedYoutube
									})
									return foundDomYtb !== -1
								}
						})
						this.selectedYoutube='all';
						return per2;
					case "snap":
						per2 = per2.filter((p) => {
								if(p.snapchat!=null){
									let foundDomSnap = p.snapchat.domaine.findIndex((c) => {
									return c.id === this.selectedSnapchat
									})
									return foundDomSnap !== -1
								}
						})
						this.selectedSnapchat='all';
						return per2;		
					default: 
						return per		
					}
					
					break;
				case "followers":
					switch(this.selectedTypeFollowers){
							case "fb":
											per2 = per2.filter((p) => {
											if(p.facebook!=null){	 
												return p.facebook.followers === this.selectedFacebookFL
											
											}
								})
								// this.selectedFacebookFL='all';
								return per2;
						
						case "insta": 
							per2 = per2.filter((p) => {
							if(p.instagram!=null){	 
								return p.instagram.followers === this.selectedInstagramFL				
							 }
							})
							// this.selectedInstagramFL='all';
							return per2;
						break;
					case "ytb":
						per2 = per2.filter((p) => {
							if(p.youtube!=null){	 
								return p.youtube.followers === this.selectedYoutubeFL
							
							 }
						})
						// this.selectedYoutubeFL='all';
						return per2;
					case "snap":
						per2 = per2.filter((p) => {
							if(p.snapchat!=null){	 
								return p.snapchat.followers === this.selectedSnapchatFL
							
							 }
						})
						// this.selectedYoutubeFL='all';
						return per2;	
					default: 
						return per			
					}
				break;
				default: 
					return per
				}
        },
        filteredPersonnesCount: function() {
            return this.filteredPersonnes.length;
        }
    }
    }	
</script>           