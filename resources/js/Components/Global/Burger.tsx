import clsx from 'clsx';
import React from 'react';

type Props = {
  setOpen: (isOpen: boolean) => void;
  open: boolean;
  onAdminLayout?: boolean;
  onSiteLayout?: boolean;
};

const Burger = ({ setOpen, open, onAdminLayout, onSiteLayout }: Props) => {
  const handleBurger = (e: React.MouseEvent<HTMLButtonElement>) => {
    e.preventDefault();
    setOpen(!open);
  };

  return (
    <button
      aria-label="Toggle menu"
      onClick={handleBurger}
      className={clsx(
        'burger relative flex h-[50px] w-[50px] cursor-pointer flex-col items-center justify-center rounded-full',
        'hover:bg-gray-100',
        open
          ? 'bg-gray-100 outline-none ring-2 ring-blue-500 ring-offset-2'
          : 'bg-transparent',
        onAdminLayout &&
          !onSiteLayout &&
          'text-white fill-current lg:hidden hover:bg-slate-700',
        onAdminLayout && open && 'bg-slate-700',
        onSiteLayout && 'md:hidden'
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
