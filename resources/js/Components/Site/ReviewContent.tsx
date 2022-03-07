import React from 'react';
import ReactMarkdown from 'react-markdown';

type Props = {
  review: string;
};

const ReviewContent = ({ review }: Props) => {
  return (
    <div className="p-5 md:p-10 bg-white rounded-lg mx-auto w-full review">
      <ReactMarkdown>{review}</ReactMarkdown>
    </div>
  );
};

export default ReviewContent;
