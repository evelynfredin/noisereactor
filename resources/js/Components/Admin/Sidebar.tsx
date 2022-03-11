import React from 'react';
import { LinkButton } from '../Global/Button';
import Logo from '../Global/Logo';
import Navigation from './Navigation';

const Sidebar = () => {
  return (
    <aside className="hidden lg:flex max-h-screen min-w-[270px] lg:flex-col">
      <Logo
        path="/admin"
        className="text-gray-300 fill-current mx-auto mt-5 mb-10 hover:text-slate-400 smoothify"
      />

      <Navigation />

      <div className="mx-auto mt-auto mb-10">
        <LinkButton small secondary href="/login">
          Logout
        </LinkButton>
      </div>
    </aside>
  );
};

export default Sidebar;
