import React from 'react';

type Props = {
  review: string;
};

const ReviewCard = ({ review }: Props) => {
  return (
    <div className="p-5 md:p-10 bg-white rounded-lg mx-auto w-full">
      {review}
    </div>
  );
};

export default ReviewCard;
