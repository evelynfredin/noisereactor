import clsx from 'clsx';
import React from 'react';

type Props = {
  title: string;
  h1?: boolean;
  h2?: boolean;
};

const Heading = ({ title, h1, h2 }: Props) => {
  return (
    <h2 className={clsx('uppercase', h1 && 'text-4xl', h2 && 'text-2xl')}>
      {title}
    </h2>
  );
};

export default Heading;
