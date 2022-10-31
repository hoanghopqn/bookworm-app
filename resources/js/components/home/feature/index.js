import React from "react"; 
import {Tabs, Tab} from "@material-ui/core"
import './style.scss';

export default function FeatureComponent() {
    const [value, setValue]=React.useState(0)
    const handleTabs =(e,val)=>{ 
          setValue(val)
    }
  return (
    <div className="main-container">
       <div className="feature-book">Featured Books</div>
       <div className="Tabs-value" position="static" >
        <Tabs value={value} onChange={handleTabs}>
            <Tab label="Recommended" />
            <Tab label="Popular"/>
        </Tabs>
       </div>
       <TabPanel value={value} index={0}>
       <div className="feature-product">
       
       
       <div className="single-product"> 
        <div className="product-top">
          <a  className="product-img">
           <img src="http://placekitten.com/g/400/200" /> 
          </a>
          <a className="buy-product">ADD</a>
        </div>
       
        <div className="product-info">
            <a className="book-title">nguyen</a>
            <a className="author-name">nguyen ngoc</a>
          </div> 
          <div className="product-price">
            <a>120</a> 
          </div>
       </div>
       
       
       <div className="single-product"> 
        <div className="product-top">
          <a  className="product-img">
           <img src="http://placekitten.com/g/400/200" /> 
          </a>
          <a className="buy-product">ADD</a>
        </div>
       
        <div className="product-info">
            <a className="book-title">nguyen</a>
            <a className="author-name">nguyen ngoc</a>
          </div> 
          <div className="product-price">
            <a>120</a> 
          </div>
       </div>
       
       <div className="single-product"> 
        <div className="product-top">
          <a  className="product-img">
           <img src="http://placekitten.com/g/400/200" /> 
          </a>
          <a className="buy-product">ADD</a>
        </div>
       
        <div className="product-info">
            <a className="book-title">nguyen</a>
            <a className="author-name">nguyen ngoc</a>
          </div> 
          <div className="product-price">
            <a>120</a> 
          </div>
       </div>
       
       
       <div className="single-product"> 
        <div className="product-top">
          <a  className="product-img">
           <img src="http://placekitten.com/g/400/200" /> 
          </a>
          <a className="buy-product">ADD</a>
        </div>
       
        <div className="product-info">
            <a className="book-title">nguyen</a>
            <a className="author-name">nguyen ngoc</a>
          </div> 
          <div className="product-price">
            <a>120</a> 
          </div>
       </div>
       
       
       <div className="single-product"> 
        <div className="product-top">
          <a  className="product-img">
           <img src="http://placekitten.com/g/400/200" /> 
          </a>
          <a className="buy-product">ADD</a>
        </div>
       
        <div className="product-info">
            <a className="book-title">nguyen</a>
            <a className="author-name">nguyen ngoc</a>
          </div> 
          <div className="product-price">
            <a>120</a> 
          </div>
       </div>
       
       
       <div className="single-product"> 
        <div className="product-top">
          <a  className="product-img">
           <img src="http://placekitten.com/g/400/200" /> 
          </a>
          <a className="buy-product">ADD</a>
        </div>
       
        <div className="product-info">
            <a className="book-title">nguyen</a>
            <a className="author-name">nguyen ngoc</a>
          </div> 
          <div className="product-price">
            <a>120</a> 
          </div>
       </div>
       
       <div className="single-product"> 
        <div className="product-top">
          <a  className="product-img">
           <img src="http://placekitten.com/g/400/200" /> 
          </a>
          <a className="buy-product">ADD</a>
        </div>
       
        <div className="product-info">
            <a className="book-title">nguyen</a>
            <a className="author-name">nguyen ngoc</a>
          </div> 
          <div className="product-price">
            <a>120</a> 
          </div>
       </div>
       
       
       <div className="single-product"> 
        <div className="product-top">
          <a  className="product-img">
           <img src="http://placekitten.com/g/400/200" /> 
          </a>
          <a className="buy-product">ADD</a>
        </div>
       
        <div className="product-info">
            <a className="book-title">nguyen</a>
            <a className="author-name">nguyen ngoc</a>
          </div> 
          <div className="product-price">
            <a>120</a> 
          </div>
       </div>
       
       
       <div className="single-product"> 
        <div className="product-top">
          <a  className="product-img">
           <img src="http://placekitten.com/g/400/200" /> 
          </a>
          <a className="buy-product">ADD</a>
        </div>
       
        <div className="product-info">
            <a className="book-title">nguyen</a>
            <a className="author-name">nguyen ngoc</a>
          </div> 
          <div className="product-price">
            <a>120</a> 
          </div>
       </div>
       
       
       <div className="single-product"> 
        <div className="product-top">
          <a  className="product-img">
           <img src="http://placekitten.com/g/400/200" /> 
          </a>
          <a className="buy-product">ADD</a>
        </div>
       
        <div className="product-info">
            <a className="book-title">nguyen</a>
            <a className="author-name">nguyen ngoc</a>
          </div> 
          <div className="product-price">
            <a>120</a> 
          </div>
       </div>
       
       
       <div className="single-product"> 
        <div className="product-top">
          <a  className="product-img">
           <img src="http://placekitten.com/g/400/200" /> 
          </a>
          <a className="buy-product">ADD</a>
        </div>
       
        <div className="product-info">
            <a className="book-title">nguyen</a>
            <a className="author-name">nguyen ngoc</a>
          </div> 
          <div className="product-price">
            <a>120</a> 
          </div>
       </div>
       
       
       <div className="single-product"> 
        <div className="product-top">
          <a  className="product-img">
           <img src="http://placekitten.com/g/400/200" /> 
          </a>
          <a className="buy-product">ADD</a>
        </div>
       
        <div className="product-info">
            <a className="book-title">nguyen</a>
            <a className="author-name">nguyen ngoc</a>
          </div> 
          <div className="product-price">
            <a>120</a> 
          </div>
       </div>
       
       
       <div className="single-product"> 
        <div className="product-top">
          <a  className="product-img">
           <img src="http://placekitten.com/g/400/200" /> 
          </a>
          <a className="buy-product">ADD</a>
        </div>
       
        <div className="product-info">
            <a className="book-title">nguyen</a>
            <a className="author-name">nguyen ngoc</a>
          </div> 
          <div className="product-price">
            <a>120</a> 
          </div>
       </div>
       </div>
       </TabPanel>
       <TabPanel value={value} index={1}>
       <div className='Banner-image'>
          <img src="http://placekitten.com/g/400/200" /> 
            <div>nguyen ngoc huu</div>
            <a>nguyen ngoc huuss</a>
          </div>
       </TabPanel>
     </div>
  )
}
function TabPanel(Props)
{
    const {children,value,index} = Props;
    return (
        <div>
           {
            value===index &&(
                <h1>{children}</h1>
            )
           }
        </div>
    )
}
