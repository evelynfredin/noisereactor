import clsx from 'clsx';
import React from 'react';

type Props = {
  title: string;
  h1?: boolean;
  h2?: boolean;
  h3?: boolean;
};

const Heading = ({ title, h1, h2, h3 }: Props) => {
  return (
    <h2
      className={clsx(
        'uppercase',
        h1 && 'text-4xl',
        h2 && 'text-2xl',
        h3 && 'text-lg text-gray-500 capitalize'
      )}
    >
      {title}
    </h2>
  );
};

export default Heading;
