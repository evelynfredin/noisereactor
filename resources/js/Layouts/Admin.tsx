import Heading from '@/Components/Admin/Heading';
import Sidebar from '@/Components/Admin/Sidebar';
import { Head } from '@inertiajs/inertia-react';
import React, { PropsWithChildren } from 'react';

type Props = {
  title: string;
};

const Admin = ({ children, title }: PropsWithChildren<Props>) => {
  return (
    <>
      <Head>
        <title>{title}</title>
      </Head>
      <div className="bg-slate-800 flex flex-col lg:flex-row overflow-auto lg:overflow-hidden">
        <Sidebar />
        <div className="bg-gray-50 lg:rounded-tl-3xl lg:rounded-bl-3xl w-full h-screen overflow-hidden overflow-y-auto">
          <main className="px-10">
            <div className="my-10">
              <Heading h1 title={title} />
            </div>
            {children}
          </main>
        </div>
      </div>
    </>
  );
};

export default Admin;
