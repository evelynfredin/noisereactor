import clsx from 'clsx';
import React, { useState } from 'react';
import Burger from '../Global/Burger';
import { LinkButton } from '../Global/Button';
import Logo from '../Global/Logo';
import Navigation from './Navigation';

const Sidebar = () => {
  const [open, setOpen] = useState<boolean>(false);
  return (
    <div className="flex lg:max-h-screen lg:min-w-[270px] flex-col">
      <div className="flex justify-between lg:justify-center items-center lg:mt-5 lg:mb-10 px-5 py-5 lg:py-0 lg:px-0">
        <Logo
          path="/admin"
          className="text-gray-300 fill-current mx-auto hover:text-slate-400 smoothify"
        />
        <Burger open={open} setOpen={setOpen} onAdminLayout />
      </div>

      <div
        className={clsx(
          'flex flex-col justify-between',
          open ? 'block lg:inline-flex' : 'hidden h-auto lg:inline-flex'
        )}
      >
        <Navigation />

        <div className="mx-auto my-10">
          <LinkButton
            small
            secondary
            href={route('logout')}
            method="post"
            as="button"
          >
            Logout
          </LinkButton>
        </div>
      </div>
    </div>
  );
};

export default Sidebar;
