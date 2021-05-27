
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
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Select</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default" v-if="getOnePersonne[0].instagram">
								<div class="panel-heading">
									<h4 class="panel-title" >
                                        <router-link :to="{name:'Instagram'}">
												<p>Instagram<Icon type="logo-instagram" /></p>
										</router-link>
									</h4>
								</div>
							</div>
							<div class="panel panel-default" v-if="getOnePersonne[0].facebook">
								<div class="panel-heading">
									<h4 class="panel-title" >
										<router-link :to="{name:'Facebook'}">
												<p>Facebook<Icon type="logo-facebook" /></p>
										</router-link>
									</h4>
								</div>
							</div>
                            <div class="panel panel-default" v-if="getOnePersonne[0].youtube">
								<div class="panel-heading">
									<h4 class="panel-title" >
										<router-link :to="{name:'Youtube'}">
												<p>Youtube<Icon type="logo-youtube" /></p>
										</router-link>
									</h4>
								</div>
							</div>
                            <div class="panel panel-default" v-if="getOnePersonne[0].snapchat">
								<div class="panel-heading">
									<h4 class="panel-title" >
										<router-link :to="{name:'Snapchat'}">
												<p>Snapchat<Icon type="logo-snapchat" /></p>
										</router-link>
									</h4>
								</div>
							</div>
							<!-- <div class="panel panel-default" v-if="user1.snapchat">
								<div class="panel-heading">
									<h4 class="panel-title" >
										<router-link :to="{name:'Snapchat',params:{user1}}">
												<p>Snapchat<Icon type="logo-snapchat" /></p>
										</router-link>
									</h4>
								</div>
							</div> -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title" >
										<router-link :to="{name:'UserDetails'}">
												<p>Info Personelle<Icon type="md-person" /></p>
										</router-link>
									</h4>
								</div>
							</div>
							
						</div><!--/category-products-->
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<!--<img src="images/product-details/1.jpg" alt="" /> -->
								<img :src="getOnePersonne[0].photo"  class="rounded-circle" alt="Cinque Terre" width="304" height="236"/><br/><br/>
								<!-- <h2>{{user1.nom}} {{user1.prenom}}</h2>
								<p><b>Age:</b> {{this.calculateAge}}</p>
								<p><b>Ville:</b>{{user1.ville}}</p> -->
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="images/product-details/sim1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/sim2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/sim3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="images/product-details/sim4.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/sim5.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/sim1.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="images/product-details/sim1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/sim3.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/sim2.jpg" alt=""></a>
										</div>
									</div>
								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7" style="text-align: center">
							<div class="product-information" ><!--/product-information-->
								<!-- <img src="images/product-details/new.jpg" class="newarrival" alt="" /> -->
								<img :src="getOnePersonne[0].photo"  class="img-circle" width="304px" height="236px" alt="" /><br/><br/>
								<h2 >{{getOnePersonne[0].nom}} {{getOnePersonne[0].prenom}}</h2>
								<p><b>Age:</b> {{this.calculateAge}}</p> 
								<p><b>Ville:</b>{{getOnePersonne[0].ville}}</p>
								<!-- <p>{{$store.state.hi}}</p> -->
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#his" data-toggle="tab">Historiques</a></li>
							</ul>
						</div>
						<div class="tab-content" v-if="getOnePersonne[0].getpersonne_info">
							<div class="tab-pane fade active in" id="details" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<h2>{{getOnePersonne[0].getpersonne_info.cm}}</h2>
												<p><b>cm:</b> {{getOnePersonne[0].getpersonne_info.cm}}</p>
												<p><b>niveux:</b> {{getOnePersonne[0].getpersonne_info.niveux}}</p>
												<p><b>specialite:</b>{{getOnePersonne[0].getpersonne_info.specialite}}</p>
												<p><b>situation:</b>{{getOnePersonne[0].getpersonne_info.situation}}</p>
												<p><b>nombre:</b>{{getOnePersonne[0].getpersonne_info.nombre}}</p>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<h2>{{getOnePersonne[0].getpersonne_info.longueur}}</h2>
												<p><b>longueur:</b> {{getOnePersonne[0].getpersonne_info.longueur}}</p>
												<p><b>nature:</b> {{getOnePersonne[0].getpersonne_info.nature}}</p>
												<p><b>cheveux:</b>{{getOnePersonne[0].getpersonne_info.cheveux}}</p>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<h2>{{getOnePersonne[0].getpersonne_info.yeux}}</h2>
												<p><b>yeux:</b> {{getOnePersonne[0].getpersonne_info.yeux}}</p>
												<p><b>kg:</b> {{getOnePersonne[0].getpersonne_info.kg}}</p>
												<p><b>couleur:</b>{{getOnePersonne[0].getpersonne_info.couleur}}</p>
											</div>
										</div>
									</div>	
								</div>
							</div>
							<div class="tab-pane fade" id="his" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center" v-for="(c,i) in getOnePersonne[0].historique" :key="i">
												<Tag color="purple">{{c.nom}}</Tag>
											</div>
										</div>
									</div>
								</div>
							</div>							
						</div>
					</div><!--/category-tab-->
					
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
					<div class="col-sm-7">
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
								<li><a href="">Online Help</a></li>
								<li><a href="">Contact Us</a></li>
								<li><a href="">Order Status</a></li>
								<li><a href="">Change Location</a></li>
								<li><a href="">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">T-Shirt</a></li>
								<li><a href="">Mens</a></li>
								<li><a href="">Womens</a></li>
								<li><a href="">Gift Cards</a></li>
								<li><a href="">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Terms of Use</a></li>
								<li><a href="">Privecy Policy</a></li>
								<li><a href="">Refund Policy</a></li>
								<li><a href="">Billing System</a></li>
								<li><a href="">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Company Information</a></li>
								<li><a href="">Careers</a></li>
								<li><a href="">Store Location</a></li>
								<li><a href="">Affillate Program</a></li>
								<li><a href="">Copyright</a></li>
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
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	
    </div>
</template>
<script>
import {mapState,mapGetters} from 'vuex'
export default{
     data(){
          return {
            personnes4:{},
       };
    },
    // props:['user1'],
    created(){
		this.getPersonnes4();
        },
    methods:{
		getPersonnes4(){
                axios.get('/api/personneLastFour').then(response=>{
                    this.personnes4=response.data;
                })
                .catch(error=>{console.log(error)})
            },
    },
	computed:{
	...mapGetters(['getOnePersonne']),
	...mapState(['iddd']),
		count () {
     		 return this.$store.state.iddd
   		},
		calculateAge() {
			var today = new Date();
			var birthDate = new Date(this.getOnePersonne[0].date);
			// console.log('agee 1 '+this.user1.date);
			// console.log('agee 1 '+this.daten);
			var age = today.getFullYear() - birthDate.getFullYear();
			var m = (today.getMonth()+1) - birthDate.getMonth();
			if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) 
			{
				age--;
			}
			return age;
        }
	},
}
</script>
