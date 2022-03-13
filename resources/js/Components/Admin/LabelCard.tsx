import React from 'react';

type Props = {
  labelName: string;
  labelCount: number;
};

const LabelCard = ({ labelCount, labelName }: Props) => {
  return (
    <div className="bg-white rounded shadow-sm p-5">
      <h3 className="text-lg md:text-2xl font-bold text-blue-600">
        {labelName}
      </h3>
      <div>
        {labelCount === 1 ? (
          <p>{labelCount} release</p>
        ) : (
          <p>{labelCount} releases</p>
        )}
      </div>
    </div>
  );
};

export default LabelCard;
