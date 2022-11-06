import React, { useState } from "react";
import './style.scss';


export default function AboutComponent() {
    return (
        <div className="about-us">
                <div className="about-us__container">
                    <div className="about-us-title">
                        <h3>About Us</h3>
                    </div>
                    <div className="about-us-body">
                        <div className="about-us-welcom">
                            <h1>Welcom to BookWorm</h1>
                            <p>Bookworm is an independent New York bookstore and language school with locations in
Manhattan and Brooklyn. We specialize in travel books and language classes.</p>
                        </div>
                        <div className="about-us-our">
                            <div className="about-us-story">
                                <h3>Our Story</h3>
                                <p>The name Bookworm was taken from the original name for New York International Airport,
which was renamed JFK in December 1963.
Our Manhattan store has just moved to the West Village. Our new location is 170 7th Avenue
South, at the corner of Perry Street.
From March 2008 through May 2016, the store was located in the Flatiron District.</p>
                            </div>
                            <div className="about-us-vision">
                                <h3> Our Vision</h3>
                                <p>One of the last travel bookstores in the country, our Manhattan store carries a range of
guidebooks (all 10% off) to suit the needs and tastes of every traveller and budget.
We believe that a novel or travelogue can be just as valuable a key to a place as any guidebook,
and our well-read, well-travelled staff is happy to make reading recommendations for any
traveller, book lover, or gift giver.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    );
};
