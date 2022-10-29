import React from 'react' 
import Slider from "react-slick";
import './style.scss';
import "slick-carousel/slick/slick.css"; 
import "slick-carousel/slick/slick-theme.css";

export const Banner=() => {
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
      </div> 
 </div>
  )
}
