import React,{Component} from "react"
import {Link} from 'react-router-dom'
import LatestProducts from "./LatestProducts";
import BestCategories from "./BestCategories";
import PopularCategories from "./PopularCategories";
import SideBanner from "./SideBanner";
import MostViewed from "./MostViewed";
import PeoplesChoice from "./PeoplesChoice";
import FeaturedProducts from "./FeaturedProducts";
import PromoProducts from "./PromoProducts";
import Sponsored from "./Sponsored";
import HomeSliders from "./HomeSliders";
import Footer from "../includes/Footer";
import Header from "../includes/Header";
import NewsLetter from "../includes/NewsLetter";


export default class IndexComponent extends Component {

    constructor(props){
        super(props)
    }
    
    render(){
        
        return (
            <div id="content-block">
              
               <Header/>

                <div className="header-empty-space"></div>

               <HomeSliders/>

                <div className="grey-background">
                    <div className="empty-space col-xs-b40 col-sm-b80"></div>
                    <div className="container">
                        <div className="row">
                            <div className="col-md-9 col-md-push-3">

                                <LatestProducts/>

                                <BestCategories/>

                                <PeoplesChoice/>

                                <PromoProducts/>

                                <Sponsored/>


                            </div>

                            <div className="col-md-3 col-md-pull-9">


                                <PopularCategories/>


                                <div className="row">

                                        <SideBanner/>


                                        <MostViewed/>



                                </div>

                                <div className="row">

                                       <FeaturedProducts/>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <NewsLetter/>

                <Footer/>
            </div>
        );
    }
}


