import clsx from 'clsx';
import React from 'react';

type Props = {
  setOpen: (isOpen: boolean) => void;
  open: boolean;
  white: boolean;
};

const Burger = ({ setOpen, open, white }: Props) => {
  const handleBurger = (e: React.MouseEvent<HTMLButtonElement>) => {
    e.preventDefault();
    setOpen(!open);
  };

  return (
    <button
      aria-label="Toggle menu"
      onClick={handleBurger}
      className={clsx(
        'burger relative flex h-[60px] w-[60px] cursor-pointer flex-col items-center justify-center rounded-full md:hidden',
        'hover:bg-gray-100',
        open
          ? 'bg-gray-100 outline-none ring-2 ring-blue-500 ring-offset-2'
          : 'bg-transparent'
      )}
    >
      {open && (
        <svg
          xmlns="http://www.w3.org/2000/svg"
          className="h-10 w-10"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            strokeLinecap="round"
            strokeLinejoin="round"
            strokeWidth={2}
            d="M6 18L18 6M6 6l12 12"
          />
        </svg>
      )}
      {!open && (
        <svg
          xmlns="http://www.w3.org/2000/svg"
          className="h-10 w-10"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            strokeLinecap="round"
            strokeLinejoin="round"
            strokeWidth={2}
            d="M4 8h16M4 16h16"
          />
        </svg>
      )}
    </button>
  );
};

export default Burger;
