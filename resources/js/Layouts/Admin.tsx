import Heading from '@/Components/Admin/Heading';
import Sidebar from '@/Components/Admin/Sidebar';
import { usePageProps } from '@/hooks/usePageProps';
import { Head } from '@inertiajs/inertia-react';
import React, { PropsWithChildren } from 'react';

type Props = {
  title: string;
};

const Admin = ({ children, title }: PropsWithChildren<Props>) => {
  const { user } = usePageProps();

  console.log(user);

  return (
    <>
      <Head>
        <title>{title}</title>
      </Head>
      <div className="bg-slate-800 flex flex-col lg:flex-row lg:overflow-hidden">
        <Sidebar />
        <div className="bg-gray-50 lg:rounded-tl-3xl lg:rounded-bl-3xl w-full h-screen lg:overflow-hidden lg:overflow-y-auto">
          <main className="px-10">
            <div className="my-10 flex justify-between items-center">
              <Heading h1 title={title} />
              <Heading h3 title={`Welcome, ${user.data.username}!`} />
            </div>
            {children}
          </main>
        </div>
      </div>
    </>
  );
};

export default Admin;
