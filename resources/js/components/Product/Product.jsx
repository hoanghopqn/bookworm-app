import React from "react";
import Checkbox from "@material-ui/core/Checkbox";
import "./Product.scss";
export const Product = () => {
    const getValue = () => {
        console.warn("duoc r");
    };
    return (
        <div className="Main-Product">
            <div className="Main-container">
                <div className="Product-container">
                    <div className="Checkbox-container">
                        <div className="Product-Checkbox">
                            <a className="Checkbox-text">Hoang</a>
                            <div className="single-Checkbox">
                                <Checkbox onChange={() => getValue()} />
                                <a>Product</a>
                            </div>
                            <div className="single-Checkbox">
                                <Checkbox onChange={() => getValue()} />
                                <a>Product</a>
                            </div>
                            <div className="single-Checkbox">
                                <Checkbox onChange={() => getValue()} />
                                <a>Product</a>
                            </div>
                        </div>
                        <div className="Product-Checkbox">
                            <a className="Checkbox-text">Nguyen</a>
                            <div className="single-Checkbox">
                                <Checkbox onChange={() => getValue()} />
                                <a>Product</a>
                            </div>
                            <div className="single-Checkbox">
                                <Checkbox onChange={() => getValue()} />
                                <a>Product</a>
                            </div>
                            <div className="single-Checkbox">
                                <Checkbox onChange={() => getValue()} />
                                <a>Product</a>
                            </div>
                        </div>
                        <div className="Product-Checkbox">
                            <a className="Checkbox-text">Vinh</a>
                            <div className="single-Checkbox">
                                <Checkbox onChange={() => getValue()} />
                                <a>Product</a>
                            </div>
                            <div className="single-Checkbox">
                                <Checkbox onChange={() => getValue()} />
                                <a>Product</a>
                            </div>
                            <div className="single-Checkbox">
                                <Checkbox onChange={() => getValue()} />
                                <a>Product</a>
                            </div>
                        </div>
                    </div>
                    <div className="feature-product">
                        <div className="single-product">
                            <div className="product-top">
                                <a className="product-img">
                                    <img src="http://placekitten.com/g/400/200" />
                                </a>
                                <a className="buy-product">ADD</a>
                            </div>
                            <div className="product-info">
                                <a>nguyen ngoc huu</a>
                                <a>nguyen ngoc huu</a>
                            </div>
                        </div>
                        <div className="single-product">
                            <div className="product-top">
                                <a className="product-img">
                                    <img src="http://placekitten.com/g/400/200" />
                                </a>
                                <a className="buy-product">ADD</a>
                            </div>
                            <div className="product-info">
                                <a>nguyen ngoc huu</a>
                                <a>nguyen ngoc huu</a>
                            </div>
                        </div>
                        <div className="single-product">
                            <div className="product-top">
                                <a className="product-img">
                                    <img src="http://placekitten.com/g/400/200" />
                                </a>
                                <a className="buy-product">ADD</a>
                            </div>
                            <div className="product-info">
                                <a>nguyen ngoc huu</a>
                                <a>nguyen ngoc huu</a>
                            </div>
                        </div>
                        <div className="single-product">
                            <div className="product-top">
                                <a className="product-img">
                                    <img src="http://placekitten.com/g/400/200" />
                                </a>
                                <a className="buy-product">ADD</a>
                            </div>
                            <div className="product-info">
                                <a>nguyen ngoc huu</a>
                                <a>nguyen ngoc huu</a>
                            </div>
                        </div>
                        <div className="single-product">
                            <div className="product-top">
                                <a className="product-img">
                                    <img src="http://placekitten.com/g/400/200" />
                                </a>
                                <a className="buy-product">ADD</a>
                            </div>
                            <div className="product-info">
                                <a>nguyen ngoc huu</a>
                                <a>nguyen ngoc huu</a>
                            </div>
                        </div>
                        <div className="single-product">
                            <div className="product-top">
                                <a className="product-img">
                                    <img src="http://placekitten.com/g/400/200" />
                                </a>
                                <a className="buy-product">ADD</a>
                            </div>
                            <div className="product-info">
                                <a>nguyen ngoc huu</a>
                                <a>nguyen ngoc huu</a>
                            </div>
                        </div>
                        <div className="single-product">
                            <div className="product-top">
                                <a className="product-img">
                                    <img src="http://placekitten.com/g/400/200" />
                                </a>
                                <a className="buy-product">ADD</a>
                            </div>
                            <div className="product-info">
                                <a>nguyen ngoc huu</a>
                                <a>nguyen ngoc huu</a>
                            </div>
                        </div>
                        <div className="single-product">
                            <div className="product-top">
                                <a className="product-img">
                                    <img src="http://placekitten.com/g/400/200" />
                                </a>
                                <a className="buy-product">ADD</a>
                            </div>
                            <div className="product-info">
                                <a>nguyen ngoc huu</a>
                                <a>nguyen ngoc huu</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};
