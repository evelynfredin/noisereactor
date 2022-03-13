interface User {
  username: string;
}

interface Auth {
  data: User;
}

interface SharedProps {
  user: Auth;
  flash: {
    message: string | null;
  };
}
