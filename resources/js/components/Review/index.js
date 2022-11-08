import React, { useState } from "react";
import "bootstrap/dist/css/bootstrap.min.css";
import "./style.scss";

export default function FindReview(props) {
    const { review } = props;
    const [selectShow, setSelectShow] = useState();
    const [selectsorts, setSelectsSorts] = useState();
    const { 
        review_title,
        review_details,
        review_date,
        rating_start 
    } = review; 
    const reviews = review.map((item, index) => {
        return (
            <div className="body-Review">
                    <div className="Review-title">
                        <div className="title">{item.review_title}</div>
                        <div className=""></div>
                        <div className="star"><a>|</a>{item.rating_start+' Star'}</div>
                    </div>
                    <div className="Review-content">{item.review_details}</div>
                    <div className="date">{item.review_date}</div>
                </div>
        );
    });
    return (
        <div className="Single-Review">
            <div className="main-Review">
                <div className="header-Review">
                    <div className="customer-Reviews">
                        Customer Reviews (Filtered by 5 star)
                    </div>
                    <div className="avg-star">avgstar Star</div>
                    <div className="star-Review">
                        <div className="count">count</div>
                        <div className="count-star">
                            <div className="count-5"> 5 star </div>
                            <div className="count-4"> 4 star</div>
                            <div className="count-3"> 3 star</div>
                            <div className="count-2"> 2 star</div>
                            <div className="count-1"> 1 star</div>
                        </div>
                    </div>
                    <div className="review-fillter"> 
                        <div className="showing">
                            Showing {1}- {12} of 126
                        </div>
                        <div className="select">
                            <select
                                value={selectsorts}
                                onChange={(e) => setSelectsSorts(e.target.value)}
                                className="select-sort"
                            >
                                <option value={"sale"}>sort by date: newest to oldest</option>
                                <option value={"popular"}>
                                sort by date: oldest to newest
                                </option> 
                            </select>
                            <select
                                value={selectShow}
                                onChange={(e) => setSelectShow(e.target.value)}
                                className="select-show"
                            >
                                <option value={15}>15</option>
                                <option value={20}>20</option>
                                <option value={25}>25</option>
                                <option value={30}>30</option>
                            </select>
                        </div>
                    </div>
                </div>
                {reviews}
            </div>
            <div className="Review">
                <div className="review-write">Write a Review</div>
                <div className="review-text">
                    <div>Add a title</div>
                    <input type="text" name="title" />
                    <div>Add a title</div>
                    <input type="text" name="title" />
                </div>
                <button className="button">Write a Review</button>
            </div>
        </div>
    );
}
