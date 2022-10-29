 import Slider from "react-slick";
import { Link } from "react-router-dom";
import React, { Component } from "react"; 
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";

export default function BannerComponent() {
    const SlickArrowLeft = ({ currentSlide, slideCount, ...props }) => (
        <img src={LeftArrow} alt="prevArrow" {...props} />
      );
    
      const SlickArrowRight = ({ currentSlide, slideCount, ...props }) => (
        <img src={RightArrow} alt="nextArrow" {...props} />
      );
        const settings = {
          dots: false,
          infinite: false,
          speed: 500,
          slidesToShow: 4,
          slidesToScroll: 1,
          initialSlide: 0,
          prevArrow: <SlickArrowLeft />,
        nextArrow: <SlickArrowRight />,
        };
        return (
         <div className="card__container">
       <h1>{title}</h1>
     <Slider {...settings} className="card__container--inner">
     <div className='Banner-image'>
          <img src="http://placekitten.com/g/400/200" />
            <div>nguyen ngoc huu</div>
            <a>nguyen ngoc huu</a>
            
          </div>
          <div className='Banner-image'>
          <img src="http://placekitten.com/g/400/200" />
            <div>nguyen ngoc huu</div>
          </div>
          <div className='Banner-image'>
          <img src="http://placekitten.com/g/400/200" />
            <div>nguyen ngoc huu</div>
          </div>
          <div className='Banner-image'>
          <img src="http://placekitten.com/g/400/200" />
            <div>nguyen ngoc huu</div>
          </div>
          <div className='Banner-image'>
          <img src="http://placekitten.com/g/400/200" />
            <div>nguyen ngoc huu</div>
          </div>
          <div className='Banner-image'>
          <img src="http://placekitten.com/g/400/200" />
            <div>nguyen ngoc huu</div>
          </div>
          <div className='Banner-image'>
          <img src="http://placekitten.com/g/400/200" />
            <div>nguyen ngoc huu</div>
          </div>
          <div className='Banner-image'>
          <img src="http://placekitten.com/g/400/200" />
            <div>nguyen ngoc huu</div>
          </div>
            </Slider>
         </div>
           
        );
}
