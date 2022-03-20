import clsx from 'clsx';
import React from 'react';

type Props = {
  size: 'small' | 'normal' | 'large';
};

const Edit = ({ size }: Props) => {
  return (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      className={clsx('inline-flex', {
        'h-4 w-4': size === 'small',
        'h-5 w-5': size === 'normal',
      })}
      viewBox="0 0 20 20"
      fill="currentColor"
    >
      <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
    </svg>
  );
};

export default Edit;
