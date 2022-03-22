import Heading from '@/Components/Admin/Heading';
import Sidebar from '@/Components/Admin/Sidebar';
import StatusMessages from '@/Components/Admin/StatusMessage';
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
      <div className="bg-slate-800 flex flex-col lg:flex-row overflow-y-auto">
        <Sidebar />
        <div className="bg-gray-50 lg:rounded-tl-3xl lg:rounded-bl-3xl w-full h-screen overflow-y-auto">
          <main className="px-3 md:px-10 mt-28 lg:mt-10">
            <StatusMessages />
            <div className="flex justify-between items-center">
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
