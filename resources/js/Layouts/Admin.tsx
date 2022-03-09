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
      <main className="container mx-auto mt-12 mb-20 px-5 md:px-0">
        {children}
      </main>
    </>
  );
};

export default Admin;
