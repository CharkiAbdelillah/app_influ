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
								<li><a href="index.html" class="active">Home</a></li>
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
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
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
									<h1><span>3</span>-SOCIAL</h1>
									<h2>Free E-Social Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/slide5.png" class="girl img-responsive" alt="" />
									<!-- <img src="images/home/logo3_miniv.png"  class="pricing" alt="" /> -->
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>3</span>-SOCIAL</h1>
									<h2>100% Responsive Design</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/slide2.png" class="girl img-responsive" alt="" />
									<!-- <img src="images/home/logo3_miniv.png"  class="pricing" alt="" /> -->
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>3</span>-SOCIAL</h1>
									<h2>Free Social Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/slide6.png" class="girl img-responsive" alt="" />
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
											<li @click="selectedDomInstagram(v.id)"><a href="#person_target">{{v.nom}}</a></li>
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
											<li @click="selectedDomFacebook(v.id)"><a href="#person_target">{{v.nom}}</a></li>
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
											<li @click="selectedDomSnapchat(v.id)"><a href="#person_target">{{v.nom}}</a></li>
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
											<li @click="selectedDomYoutube(v.id)"><a href="#person_target">{{v.nom}}</a></li>
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
											<Slider v-model="valueInsta" range></Slider>
											</div>
											<label for="">Followers</label>
											<!-- <div class="text-center"> -->
												<ul class="nav nav-pills nav-stacked">
													<li @click="selectedFolowInstagram(folow1)"><a href="#person_target">Nano(1k-10k)</a></li>
													<li @click="selectedFolowInstagram(folow2)"><a href="#person_target">Micro(10k-50k)</a></li>
													<li @click="selectedFolowInstagram(folow3)"><a href="#person_target">Mid-tier(50k-500k)</a></li>
													<li @click="selectedFolowInstagram(folow4)"><a href="#person_target">Macro(500k-1m)</a></li>
													<li @click="selectedFolowInstagram(folow5)"><a href="#person_target">Mega(1m et +)</a></li>
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
											<Slider v-model="valueFb" range></Slider>
											</div>
											<label for="">Followers</label>
											<!-- <div class="text-center"> -->
												<ul class="nav nav-pills nav-stacked">
													<li @click="selectedFolowFacebook(folow1)"><a href="#person_target">Nano(1k-10k)</a></li>
													<li @click="selectedFolowFacebook(folow2)"><a href="#person_target">Micro(10k-50k)</a></li>
													<li @click="selectedFolowFacebook(folow3)"><a href="#person_target">Mid-tier(50k-500k)</a></li>
													<li @click="selectedFolowFacebook(folow4)"><a href="#person_target">Macro(500k-1m)</a></li>
													<li @click="selectedFolowFacebook(folow5)"><a href="#person_target">Mega(1m et +)</a></li>
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
											<Slider v-model="valueSnap" range></Slider>
											</div>
											<label for="">Followers</label>
											<!-- <div class="text-center"> -->
												<ul class="nav nav-pills nav-stacked">
													<li @click="selectedFolowSnapchat(folow1)"><a href="#person_target">Nano(1k-10k)</a></li>
													<li @click="selectedFolowSnapchat(folow2)"><a href="#person_target">Micro(10k-50k)</a></li>
													<li @click="selectedFolowSnapchat(folow3)"><a href="#person_target">Mid-tier(50k-500k)</a></li>
													<li @click="selectedFolowSnapchat(folow4)"><a href="#person_target">Macro(500k-1m)</a></li>
													<li @click="selectedFolowSnapchat(folow5)"><a href="#person_target">Mega(1m et +)</a></li>
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
											<Slider v-model="valueYtb" range></Slider>
											</div>
											<label for="">Followers</label>
											<!-- <div class="text-center"> -->
												<ul class="nav nav-pills nav-stacked">
													<li @click="selectedFolowYoutube(folow1)"><a href="#person_target">Nano(1k-10k)</a></li>
													<li @click="selectedFolowYoutube(folow2)"><a href="#person_target">Micro(10k-50k)</a></li>
													<li @click="selectedFolowYoutube(folow3)"><a href="#person_target">Mid-tier(50k-500k)</a></li>
													<li @click="selectedFolowYoutube(folow4)"><a href="#person_target">Macro(500k-1m)</a></li>
													<li @click="selectedFolowYoutube(folow5)"><a href="#person_target">Mega(1m et +)</a></li>
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
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
							<label for="vol">Price (between 0 and 1000):</label>
							<input type="range" v-model="range" min="0" max="1000" step="10"/> 
							Selected : {{this.range}}
						</div><!--/price-range-->
							<Slider v-model="value" range></Slider>
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
												<p>{{user1.nom}}</p>
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
					<pagination :data="this.personnes.perso" @pagination-change-page="getResults" class="mt-5"></pagination>
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
							<h2><span>e</span>-shopper</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe1.png" alt="" />
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
						</div>
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
                range:0,
				
            }
        },
        created(){
            this.getHistorique();
            this.getPersonnes();
            this.getPersonnes2();
			this.getDomaine();
        },
        mounted() {
            console.log('moooonted');
},
        methods:{
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
            getResults(page = 1) {
			axios.get('/api/personne?page=' + page)
				.then(response => {
					this.personnes = response.data;
				});
		    },
            selectedHis(id){
                this.selectedHistorique=id;
            },
			selectedDomInstagram(id){
                this.selectedInstagram=id;
            },
			selectedDomYoutube(id){
                this.selectedYoutube=id;
            },
			selectedDomFacebook(id){
                this.selectedFacebook=id;
            },
			selectedDomSnapchat(id){
                this.selectedSnapchat=id;
            },
			selectedFolowInstagram(str){
                this.selectedInstagramFL=str;
            },
			selectedFolowYoutube(str){
                this.selectedYoutubeFL=str;
            },
			selectedFolowFacebook(str){
                this.selectedFacebookFL=str;
            },
			selectedFolowSnapchat(str){
                this.selectedSnapchatFL=str;
            },
            refresh(personnes){
                this.getPersonnes();
            },
    },
    computed:{
        filterInfl:function(){
            var vm=this;
            var historique=vm.selectedHistorique;
                if(historique===''){
                    return vm.personnes;
                }else{
                    // return vm.personnes.perso.data.filter((pers)=>pers.id===7);
                    return vm.personnes.perso.data.filter(function(person) {
					// return this.data.some(has=>person.data.id.includes(has));
                        return person.nom.includes('laravel');
				});
                }   
        },
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
					return per;
				}
                return per2;
            }
			this.select_search='all';
            if(this.selectedHistorique && this.selectedHistorique !== 'all') {
				console.log('inside filter histo hhhh');
                per2 = per2.filter((p) => {
                            let foundHistorique = p.historique.findIndex((c) => {
                             return c.id === this.selectedHistorique
                })
                return foundHistorique !== -1
                })
                this.selectedHistorique='all';
				
                return per2;
            }


			if(this.selectedInstagram && this.selectedInstagram !== 'all') {
                per2 = per2.filter((p) => {
					// alert('doom1 : '+p);
					var jsonStr = JSON.stringify(p);
					console.log('doooooooom: '+jsonStr);
					if(jsonStr.instagram){
						console.log('doooooooom: '+jsonStr.instagram);
					}
							if(p.instagram!=null){
								console.log('doooooooom2222: '+p.instagram);
								let foundDomInsta = p.instagram.domaine.findIndex((c) => {
									console.log('doooooooom2222333333: '+c.id);
								return c.id === this.selectedInstagram
								})
								return foundDomInsta !== -1
							 }
                })
                this.selectedInstagram='all';
                return per2;
            }
			if(this.selectedYoutube && this.selectedYoutube !== 'all') {
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
            }
			if(this.selectedFacebook && this.selectedFacebook !== 'all') {
                per2 = per2.filter((p) => {
							if(p.facebook!=null){
								let foundDomFb = p.facebook.domaine.findIndex((c) => {
								return c.id === this.selectedFacebook
								})
								return foundDomFb !== -1
							 }
                })
                this.selectedFacebook='all';
                return per2;
            }
			if(this.selectedSnapchat && this.selectedSnapchat !== 'all') {
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
            }
			//filer by followers
			if(this.selectedFacebookFL && this.selectedFacebookFL !== 'all') {
                per2 = per2.filter((p) => {
							if(p.facebook!=null){	 
								return p.facebook.followers === this.selectedFacebookFL
							
							 }
                })
                this.selectedFacebookFL='all';
                return per2;
            }
			if(this.selectedInstagramFL && this.selectedInstagramFL !== 'all') {
                per2 = per2.filter((p) => {
							if(p.instagram!=null){	 
								return p.instagram.followers === this.selectedInstagramFL				
							 }
                })
                this.selectedInstagramFL='all';
                return per2;
            }
			if(this.selectedFacebookFL && this.selectedFacebookFL !== 'all') {
                per2 = per2.filter((p) => {
							if(p.facebook!=null){	 
								return p.facebook.followers === this.selectedFacebookFL
							
							 }
                })
                this.selectedFacebookFL='all';
                return per2;
            }
			if(this.selectedYoutubeFL && this.selectedYoutubeFL !== 'all') {
                per2 = per2.filter((p) => {
							if(p.youtube!=null){	 
								return p.youtube.followers === this.selectedYoutubeFL
							
							 }
                })
                this.selectedYoutubeFL='all';
                return per2;
            }
			//filter nombre d'abonne

			// if(this.range !== 0) {
			// 	// console.log('1er : '+this.value[0]+' 2eme : '+this.value[1]);
            //     per2 = per2.filter((p) => {
			// 				if(p.instagram!=null){
			// 					console.log('range 22 : '+p.instagram.nombre_abonne+' range : '+this.range);				
			// 					return p.instagram.nombre_abonne > 0 && p.instagram.nombre_abonne<this.range;
			// 				 }
            //     })
            //     this.range=0;
            //     return per2;
            // }

			// if( this.selectNumInsta!=='all') {
			if( this.valueInsta[1]!==0 && this.valueInsta[0]!==0) {
				console.log('1er insta : '+this.valueInsta[0]+' 2eme insta : '+this.valueInsta[1]);
				if(this.nombre.selectNumInsta =='Like'){
					per2 = per2.filter((p) => {
								if(p.instagram!=null){
									return p.instagram.like > this.valueInsta[0] && p.instagram.like<this.valueInsta[1];
								}
					})
				}
				else if(this.nombre.selectNumInsta =='Abonne'){
					per2 = per2.filter((p) => {
								if(p.instagram!=null){
									return p.instagram.nombre_abonne > this.valueInsta[0] && p.instagram.nombre_abonne<this.valueInsta[1];
								}
					})
				}
				if(this.nombre.selectNumInsta =='Comm'){
					per2 = per2.filter((p) => {
								if(p.instagram!=null){
									return p.instagram.commentaire > this.valueInsta[0] && p.instagram.commentaire<this.valueInsta[1];
								}
					})
				}
				// this.nombre.selectNumInsta='all';
				return per2;
            }
			// if( this.nombre.selectNumFb!=='all') {
			if( this.valueFb[1]!==0 && this.valueFb[0]!==0) {
				if(this.nombre.selectNumFb =='Like'){
					per2 = per2.filter((p) => {
								if(p.facebook!=null){
									return p.facebook.like > this.valueFb[0] && p.facebook.like<this.valueFb[1];
								}
					})
				}
				else if(this.nombre.selectNumFb =='Abonne'){
					per2 = per2.filter((p) => {
								if(p.facebook!=null){
									return p.facebook.nombre_abonne > this.valueFb[0] && p.facebook.nombre_abonne<this.valueFb[1];
								}
					})
				}
				if(this.nombre.selectNumInsta =='Comm'){
					per2 = per2.filter((p) => {
								if(p.instagram!=null){
									return p.instagram.commentaire > this.valueInsta[0] && p.instagram.commentaire<this.valueInsta[1];
								}
					})
				}
				// this.nombre.selectNumFb='all';
				return per2;
            }
			// if( this.selectNumYtb!=='all') {
			if( this.valueYtb[1]!==0 && this.valueYtb[0]!==0) {
				// console.log('1er insta : '+this.valueInsta[0]+' 2eme insta : '+this.valueInsta[1]);
				if(this.nombre.selectNumYtb =='Like'){
					per2 = per2.filter((p) => {
								if(p.youtube!=null){
									return p.youtube.like > this.valueYtb[0] && p.youtube.like<this.valueYtb[1];
								}
					})
				}
				else if(this.nombre.selectNumYtb =='Abonne'){
					per2 = per2.filter((p) => {
								if(p.youtube!=null){
									return p.youtube.nombre_abonne > this.valueYtb[0] && p.youtube.nombre_abonne<this.valueYtb[1];
								}
					})
				}
				if(this.nombre.selectNumYtb =='Comm'){
					per2 = per2.filter((p) => {
								if(p.youtube!=null){
									return p.youtube.commentaire > this.valueYtb[0] && p.youtube.commentaire<this.valueYtb[1];
								}
					})
				}
				// this.nombre.selectNumInsta='all';
				return per2;
            }
			// if( this.selectNumSnap!=='all') {
			if( this.valueSnap[1]!==0 && this.valueSnap[0]!==0) {
				console.log('1er Snap : '+this.valueSnap[0]+' 2eme Snap : '+this.valueSnap[1]);
				if(this.nombre.selectNumSnap =='Like'){
					per2 = per2.filter((p) => {
								if(p.snapchat!=null){
									return p.snapchat.like > this.valueSnap[0] && p.snapchat.like<this.valueSnap[1];
								}
					})
				}
				else if(this.nombre.selectNumSnap =='Abonne'){
					per2 = per2.filter((p) => {
								if(p.snapchat!=null){
									return p.snapchat.nombre_abonne > this.valueSnap[0] && p.snapchat.nombre_abonne<this.valueSnap[1];
								}
					})
				}
				if(this.nombre.selectNumSnap =='Comm'){
					per2 = per2.filter((p) => {
								if(p.snapchat!=null){
									return p.snapchat.commentaire > this.valueSnap[0] && p.snapchat.commentaire<this.valueSnap[1];
								}
					})
				}
				// this.nombre.selectNumSnap='all';
				return per2;
            }
			// ********* filter nombre ************
			else
            return per
        },
        filteredPersonnesCount: function() {
            return this.filteredPersonnes.length;
        }
    }
    }	
</script>           