import React from 'react';

type Props = {
  count: number;
  label: string;
};

const Stats = ({ count, label }: Props) => {
  return (
    <div className="bg-blue-200 rounded-lg flex flex-col justify-center items-center w-full p-10">
      <h2 className="uppercase text-5xl">{count}</h2>
      <p className="text-xl text-center">{label}</p>
    </div>
  );
};

export default Stats;
