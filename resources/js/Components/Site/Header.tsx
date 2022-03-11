import React, { useState } from 'react';
import Navigation from '@/Components/Site/Navigation';
import Logo from '../Global/Logo';
import Burger from '../Global/Burger';

const Header = () => {
  const [open, setOpen] = useState<boolean>(false);
  return (
    <header className="border-b-4 border-blue-700 p-5">
      <div className="container mx-auto items-center md:flex md:justify-between">
        <div className="container mx-auto flex items-center justify-between">
          <Logo path="/" className="fill-current text-gray-700" />
          <Burger open={open} setOpen={setOpen} onSiteLayout />
        </div>
        <div
          className={`${
            open
              ? 'block h-[250px] md:inline-flex md:h-auto'
              : 'hidden h-auto md:inline-flex'
          }`}
        >
          <Navigation onMenuClick={() => setOpen(false)} />
        </div>
      </div>
    </header>
  );
};

export default Header;
