import clsx from 'clsx';
import React from 'react';

type Props = {
  size: 'small' | 'normal' | 'large';
};

const Chevron = ({ size }: Props) => {
  return (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      className={clsx('inline-flex', {
        'h-5 w-5': size === 'small',
        'h-6 w-6': size === 'normal',
        'h-8 w-8': size === 'large',
      })}
      fill="none"
      viewBox="0 0 24 24"
      stroke="currentColor"
      strokeWidth={2}
    >
      <path strokeLinecap="round" strokeLinejoin="round" d="M9 5l7 7-7 7" />
    </svg>
  );
};

export default Chevron;
