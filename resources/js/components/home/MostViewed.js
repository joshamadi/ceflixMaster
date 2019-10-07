import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {Link} from 'react-router-dom';


class MostViewed extends  Component{
    constructor(props){
        super(props)

        this.state = {
            data: [],
            httpstate:'0'
        }
    }


    componentDidMount(){
        axios.get('/api/most-viewed?num=10')
            .then( (response) => {
                if(response.data.data.length > 0) {

                    this.setState({data: response.data.data,httpstate:'2'})
                }else{
                    this.setState({data: response.data.data,httpstate:'1'})
                }
            })
    }




    render() {

        if (this.state.httpstate == 0){
            return (
                <React.Fragment>
                    <div align="center" className="spinner_style">
                        <i className="fa fa-spinner fa-spin fa-3x"></i> <br/>
                        ...loading....
                    </div>
                    <div className="empty-space col-xs-b35 col-md-b70"></div>
                </React.Fragment>
            )
        }

        if(this.state.httpstate == 2){
        return (


            <React.Fragment>
                <div className="col-sm-6 col-md-12">
                    <div className="h4 col-xs-b25">most viewed</div>

                                    { this.state.data.map((item,index) => {

                                           return   <React.Fragment>
                                                        <div className="product-shortcode style-4 clearfix">
                                                            <Link className="preview" to="/#"><img src={item.image} alt="" /></Link>
                                                           <div className="description">
                                                               <div className="simple-article color size-1 col-xs-b5"><Link to="/#">{item.category_name}</Link>
                                                               </div>
                                                               <h6 className="h6 col-xs-b10"><Link to="/#">{item.product_title}</Link></h6>
                                                               <div className="simple-article dark">${item.price}.00</div>
                                                           </div>
                                                        </div>

                                                    <div className="col-xs-b10"></div>
                                                </React.Fragment>

                                        })

                                    }


                <div className="empty-space col-xs-b25 col-sm-b50"></div>
                </div>





            </React.Fragment>



        )}

         if(this.state.httpstate == 1) {
             return (
                 <React.Fragment>
                     <div className="alert alert-warning">
                         No product found
                     </div>
                     <div className="empty-space col-xs-b35 col-md-b70"></div>
                 </React.Fragment>
             )
         }
    }
}

export default MostViewed;



