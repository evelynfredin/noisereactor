import React, { PropsWithChildren } from 'react';
import Header from '@/Components/Site/Header';
import { Head } from '@inertiajs/inertia-react';

type Props = {
  title: string;
};

const Main = ({ title, children }: PropsWithChildren<Props>) => {
  return (
    <>
      <Head>
        <title>{title}</title>
      </Head>
      <Header />
      <main className="container mx-auto mt-12 mb-20 px-5 md:px-0">
        {children}
      </main>
    </>
  );
};

export default Main;
