import React from 'react' 
import Slider from "react-slick";
import './style.scss';
import "slick-carousel/slick/slick.css"; 
import "slick-carousel/slick/slick-theme.css";

export default function BannerComponent() {
    let settings = { 
      dots: false,
      infinite: true,
      speed: 500,
      slidesToShow: 4,
      slidesToScroll: 4
      };
  return (
    <div className='Banner'>
        <div className='Banner-Container'> 
        <div className='Banner-header'>
            <span className='Banner-title'>On Sale</span>
            <button className='Banner-btn'>viewAll</button>
        </div> 
        
        <div className='Banner-body'>

        <Slider {...settings}>
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
        </Slider> 
        </div>
      </div> 
 </div>
  )
}
