import Sidebar from '@/Components/Admin/Sidebar';
import { usePageProps } from '@/hooks/usePageProps';
import { Head } from '@inertiajs/inertia-react';
import React, { PropsWithChildren } from 'react';

type Props = {
  title: string;
};

const Admin = ({ children, title }: PropsWithChildren<Props>) => {
  const { username }: User = usePageProps();
  console.log(username);

  return (
    <>
      <Head>
        <title>{title}</title>
      </Head>
      <div className="bg-slate-800 flex flex-col lg:flex-row overflow-auto lg:overflow-hidden">
        <Sidebar />
        <div className="bg-gray-50 lg:rounded-tl-3xl lg:rounded-bl-3xl w-full h-screen overflow-hidden overflow-y-auto">
          <main className="px-10 py-20">{children}</main>
        </div>
      </div>
    </>
  );
};

export default Admin;
