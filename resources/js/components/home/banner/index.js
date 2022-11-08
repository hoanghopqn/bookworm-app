import React from "react";
import Slider from "react-slick";
import "./style.scss";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import CardBook from "../../CardBook";
import { Link } from "react-router-dom";

export default function BannerComponent(props) {
    let settings = {
        dots: false,
        infinite: true,
        speed: 500,
        slidesToShow: 4,
        slidesToScroll: 4,
    };
    const { saleBooks } = props;
    const slides = saleBooks.map((book, index) => {
        return (
            <div className="single-product">
                <CardBook detailBook={book} />
            </div>
        );
    });
    return (
        <div className="Banner">
            <div className="Banner-Container">
                <div className="Banner-header">
                    <span className="Banner-title">On Sale</span>
                    <div className="Banner-btn">
                        <Link to={"/shop"}>
                            <button>viewAll</button>
                        </Link>
                    </div>
                </div>

                <div className="Banner-body">
                    <Slider {...settings}>{slides}</Slider>
                </div>
            </div>
        </div>
    );
}
