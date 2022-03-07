import ReviewCard from '@/Components/Site/ReviewCard';
import Main from '@/Layouts/Main';
import { diffForHumans } from '@/utils/helpers';
import React from 'react';

type Props = {
  reviews: App.Review[];
};

const Reviews = ({ reviews }: Props) => {
  return (
    <Main title="Reviews">
      <div>
        <h2 className="font-heading text-4xl">Reviews</h2>
      </div>

      <section className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mx-auto gap-8 my-10">
        {reviews &&
          reviews.map((review) => (
            <ReviewCard
              key={review.id}
              createdAt={diffForHumans(review.created_at)}
              artistName={review.album.artist.name}
              albumTitle={review.album.title}
              excerpt={review.excerpt}
              pathToAlbum={review.album.id}
            />
          ))}
      </section>
    </Main>
  );
};

export default Reviews;
