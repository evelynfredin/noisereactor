import clsx from 'clsx';
import React from 'react';

type Props = {
  size: 'small' | 'normal' | 'large';
};

const Plus = ({ size }: Props) => {
  return (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      className={clsx('inline-flex', {
        'h-5 w-5': size === 'small',
        'h-6 w-6': size === 'normal',
        'h-8 w-8': size === 'large',
      })}
      viewBox="0 0 20 20"
      fill="currentColor"
    >
      <path
        fillRule="evenodd"
        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
        clipRule="evenodd"
      />
    </svg>
  );
};

export default Plus;
