import React from 'react';

type Props = {
  labelName: string;
  labelCount: number;
};

const LabelCard = ({ labelCount, labelName }: Props) => {
  return (
    <div className="bg-white border rounded-md shadow-sm py-3 px-5 h-full flex flex-col justify-between">
      <h3 className="text-lg md:text-xl font-bold">{labelName}</h3>
      <div className="block uppercase text-gray-500 text-sm">
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
