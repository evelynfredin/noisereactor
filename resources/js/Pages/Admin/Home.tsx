import Stats from '@/Components/Admin/Stats';
import Admin from '@/Layouts/Admin';
import React from 'react';

type Props = {
  stats: App.Stat[];
};

const Home = ({ stats }: Props) => {
  console.log(stats);

  return (
    <Admin title="Admin">
      <section className="grid grid-cols-1 mx-auto w-full md:grid-cols-3 gap-10">
        {stats &&
          stats.map((stat) => (
            <Stats key={stat.id} label={stat.stat} count={stat.count} />
          ))}
      </section>
    </Admin>
  );
};

export default Home;
